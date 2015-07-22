#/bin/sh
if test $# -eq 0;then
	echo usage:$0 [inputfile]+
	exit 1
fi

DIR=packetsize

rm -rf ${DIR}
mkdir ${DIR}

#--------#
#  SORT  #
#--------#
#[1]epoc [2]plen] [3]sid [4]opid [5]ifid [6]itid [7]actn [8]form
for DAT in $*
do
	echo " ${DAT} >> ${DIR}/numpacket.data"
	awk '{print $2}' ${DAT} >> ${DIR}/numpacket.data
done

	echo "sort -n ${DIR}/numpacket.data  > ${DIR}/numpacket.sort.data"
	sort -n ${DIR}/numpacket.data  > ${DIR}/numpacket.sort.data

#-------#
# GRAPH #
#-------#
echo "${DIR}/numpacket.sort.data > ${DIR}/numpacket.graph"
awk '
{
	if(NR == 1)
	{
		base = $1;
		count = 1;
	}else
	{
		if(base == $1)
		{
			count++;
		}else
		{
			print base,count;
			base = $1;
			count = 1;
		}
	}
}
END{print base,count;}
' ${DIR}/numpacket.sort.data > ${DIR}/numpacket.graph

echo "[Size] [Number]"
cat ${DIR}/numpacket.graph
