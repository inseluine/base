#/bin/sh
if test $# -eq 0;then
	echo usage:$0 [inputfile]+
	exit 1
fi

DIR=source

rm -rf ${DIR}
mkdir ${DIR}

RANGE=`echo $1 | awk -F '[_/]+' '{print $4}'`
RANGE=`expr ${RANGE} \* 60000`

#--------#
#  SORT  #
#--------#
for DAT in $*
do
	echo "${DAT} >> ${DIR}/throughput.data session.count.data"
	awk '{if(NR==1){size =$2;source = $3; range = '${RANGE}'}else{
			size+= $2; 
		}}END{print source,size,((size * 8) / (range / 1000) / 1000)}' ${DAT} >> ${DIR}/throughput.data

 	sort -k 4 ${DAT} | awk '/SND/{
    if($7 == "0225"){print $0}}' > ${DIR}/session1.data
    awk '{if(NR == 1){
                session = 1; source = $3; stid = $4;time = $1;
            }else{
                if($4 != stid){
                    session++; stid = $4; time = $1;
                }else if(($4 == stid) && (($1 - time) > 60000)){
                    session++; stid = $4; time = $1;
        }   }   }
		END{
			print source,session;
		}' ${DIR}/session1.data >> ${DIR}/session.count.data
	
    sort -k 4 ${DAT} | awk '/SND/{
    if($7 == "0225" || $8 == "2"){print $0}}' > ${DIR}/session16.data
    awk 'BEGIN{max=0;min=123456789;avcount=0}{if(NR == 1){
            source = $3;stid = $4;time = $1;itid = $8;latency = 0;
        }else{
            if(($4 == stid) && (($1 - time) < 600000) && ($8 != itid)){
                latency += ($1-time); avcount++;
				if(max < ($1 - time))max = ($1 - time);
				if(min > ($1 - time))min = ($1 - time);
            }else if($4 != stid){
                stid = $4;time = $1;itid = $8;
            }else if(($4 == stid) && (($1 - time) >= 600000)){
                stid = $4;time = $1;itid = $8;
    }   }   }END{print source,latency/avcount,max,min}' ${DIR}/session16.data >> ${DIR}/latency.data

	awk '{print $4,$3}' ${DAT} | sort -n | awk '{if(NR==1){count=1;retry=0;base=$1;source=$2}else{if($1==base){count++}else{base=$1;if(count>6){retry+=count-6}count=1}}}END{print source,retry}' > ${DIR}/retry.data

done

	echo "sort -n ${DIR}/throughput.data  > ${DIR}/throughput.sort.data"
	sort -n ${DIR}/throughput.data  > ${DIR}/throughput.graph
    echo "sort -n ${DIR}/session.count.data > ${DIR}/session.count.sort.data"
    sort -n ${DIR}/session.count.data > ${DIR}/session.count.graph
    echo "sort -n ${DIR}/latency.data > ${DIR}/latency.sort.data"
    sort -n ${DIR}/latency.data > ${DIR}/latency.graph
	echo "sort -n ${DIR}/retry.data > ${DIR}/retry.graph"
	sort -n ${DIR}/retry.data > ${DIR}/retry.graph

