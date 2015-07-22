#/bin/sh
WIDTH=10
if test $# -eq 0;then
    echo usage:$0 [inputfile]+
    exit 1
fi
DIR=time

rm -rf ${DIR}
mkdir ${DIR}

WIDTH=`expr ${WIDTH} \* 60000`
DELAY=`echo $1 | awk -F '[_/]+' '{print $3}'`
RANGE=`echo $1 | awk -F '[_/]+' '{print $4}'`
echo $1

BASETIME=`cat ../setup.data | awk '{print $1}'`
DELAY=`expr ${DELAY} \* 60000`
STARTTIME=`expr ${BASETIME} \+ ${DELAY}`
RANGE=`expr ${RANGE} \* 60000`
ENDTIME=`expr ${STARTTIME} \+ ${RANGE}`
echo ${BASETIME}
echo ${DELAY}
echo ${STARTTIME}
echo ${RANGE}
echo ${WIDTH}
echo ${ENDTIME}

#--------#
#  SORT  #
#--------#
echo "inputfile > ${DIR}/sort.data"
for DAT in $*
do
	echo "${DAT} >> ${DIR}/throughput.data session.count.data session.retry.data latency.data"
    cat ${DAT} >> ${DIR}/throughput.data

	sort -k 4 ${DAT} | awk '/SND/{
	if($7 == "0225"){print $0}}' > ${DIR}/session1.data
	awk '{if(NR == 1){
				print $0; stid = $4;time = $1;
			}else{
				if($4 != stid){
					print $0; stid = $4; time = $1;
				}else if(($4 == stid) && (($1 - time) > 60000)){
					print $0; stid = $4; time = $1;
		}	}	}' ${DIR}/session1.data >> ${DIR}/session.count.data
	awk '{if(NR == 1){
				stid = $4;time = $1;
			}else{
				if($4 != stid){
					stid = $4; time = $1;
				}else if(($4 == stid) && (($1 - time) <= 60000)){
					print $0; stid = $4; time = $1;
		}	}	}' ${DIR}/session1.data >> ${DIR}/session.retry.data

	sort -k 4 ${DAT} | awk '/SND/{
	if($7 == "0225" || $8 == "2"){print $0}}' > ${DIR}/session16.data
	awk '{if(NR == 1){
			stid = $4;time = $1;itid = $8;
		}else{
			if(($4 == stid) && (($1 - time) < 600000) && ($8 != itid)){
				print time,($1-time);
			}else if($4 != stid){
				stid = $4;time = $1;itid = $8;
			}else if(($4 == stid) && (($1 - time) >= 600000)){
				stid = $4;time = $1;itid = $8;
	}	}	}' ${DIR}/session16.data >> ${DIR}/latency.data	
done

    echo "sort -n  ${DIR}/union.data  > ${DIR}/sort.data"
    sort -n ${DIR}/throughput.data  > ${DIR}/throughput.sort.data
	echo "sort -n ${DIR}/latency.data > ${DIR}/latency.sort.data"
	sort -n ${DIR}/latency.data > ${DIR}/latency.sort.data
	echo "sort -n ${DIR}/session.count.data > ${DIR}/session.count.sort.data"
	sort -n ${DIR}/session.count.data > ${DIR}/session.count.sort.data
	echo "sort -n ${DIR}/session.retry.data > ${DIR}/session.retry.sort.data"
	sort -n ${DIR}/session.retry.data > ${DIR}/session.retry.sort.data

#-------#
# GRAPH #
#-------#
echo "Throughput-caliculate ${DIR}/union.sort.data > ${DIR}/throughput.graph"
awk 'BEGIN{
        starttime = '${STARTTIME}';
		basetime = '${STARTTIME}';
		stoptime = '${ENDTIME}'; width = '${WIDTH}';
        size = 0;
    }
    {
            caltime = ($1 - basetime)
            if(caltime  < width)
            {
                size += $2;
            }else
            {
                printtime = ((basetime - starttime) / 60000);
                throughput = (size * 8) / (width/1000) / 1000;
                print printtime,size/1000,throughput;
                size = $2;  
                basetime += width;
            }
    }
	END{
            printtime = ((basetime - starttime) / 60000);
            throughput = (size * 8) / (width/1000) / 1000;
            print printtime,size/1000,throughput;
    }
' ${DIR}/throughput.sort.data > ${DIR}/throughput.graph

echo "Latency-caliculate ${DIR}/latency.sort.data > ${DIR}/latency.graph"
awk 'BEGIN{
        starttime = '${STARTTIME}';
		basetime = '${STARTTIME}';
		stoptime = '${ENDTIME}'; width = '${WIDTH}';
		avecount = 0;
		max = 0;
		min = 123456789;
        latency = 0;
    }
    {
            caltime = ($1 - basetime)
            if(caltime  < width)
            {
                latency += $2;
				avecount++;
				if($2 > max)max = $2;
				if($2 < min)min = $2;
            }else
            {
                printtime = ((basetime - starttime) / 60000);
                print printtime,(latency/avecount),max,min;
                latency = $2;  
				avecount = 1;
				max = 0;
				min = 123456789;
                basetime += width;
            }
    }
	END{
            printtime = ((basetime - starttime) / 60000);
            print printtime,(latency/avecount),max,min;
	}
' ${DIR}/latency.sort.data > ${DIR}/latency.graph

echo "SessionCount-caliculate ${DIR}/session.count.sort.data > ${DIR}/session.count.graph"
awk 'BEGIN{
        starttime = '${STARTTIME}';
		basetime = '${STARTTIME}';
		stoptime = '${ENDTIME}'; width = '${WIDTH}';
		session = 0
    }
    {
            caltime = ($1 - basetime)
            if(caltime  < width)
            {
				session++;
            }else
            {
                printtime = ((basetime - starttime) / 60000);
                print printtime,session;
				session = 1;
                basetime += width;
            }
    }
	END{
            printtime = ((basetime - starttime) / 60000);
            print printtime,session;
	}
' ${DIR}/session.count.sort.data > ${DIR}/session.count.graph

echo "SessionRetry-caliculate ${DIR}/session.count.sort.data > ${DIR}/session.count.graph"
awk 'BEGIN{
        starttime = '${STARTTIME}';
		basetime = '${STARTTIME}';
		stoptime = '${ENDTIME}'; width = '${WIDTH}';
		retry = 0
    }
    {
            caltime = ($1 - basetime)
            if(caltime  < width)
            {
				retry++;
            }else
            {
                printtime = ((basetime - starttime) / 60000);
                print printtime,retry;
				retry = 1;
                basetime += width;
            }
    }
	END{
            printtime = ((basetime - starttime) / 60000);
            print printtime,retry;
	}
' ${DIR}/session.retry.sort.data > ${DIR}/session.retry.graph
:<<'#come'
#------#
# DRAW #
#------#
cat ${SETUPFILE}
echo "DRAW ${LIBRARY}/${DRAW} < ${GRAPH}"
sh ${LIBRARY}/${DRAW} ${GRAPH}
#come

