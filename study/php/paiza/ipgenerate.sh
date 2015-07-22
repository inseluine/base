#!/bin/sh

if [ $# -eq 0 ]; then
    echo 'usage: ipgenerate [ipCount]'
    exit
fi

for DAT in `seq $1`
do
    echo `expr $RANDOM % 255`.`expr $RANDOM % 255`.`expr $RANDOM % 255`.`expr $RANDOM % 255`
done
