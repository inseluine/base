#!/bin/bash
if [ $# -ne 1 ];then
    echo Usage:$0 [username]
    exit
else
    DIR=`pwd`
    USER=$1
    USER_DIR=/home/$USER/
    BIN_DIR=/usr/local/bin
fi

if [ ! -e $USER_DIR ];then
    echo USER:$USER not found
    exit
fi

if [ ! -e $BIN_DIR ];then
    mkdir -p $BIN_DIR
fi

#vim setup
cp ${DIR}/.vimrc $USER_DIR 

#screen setup
TARGET_NAME=screen
TARGET_URL=`cat ${DIR}/url | awk /$TARGET/'{print $2}'`
ARCHIVE_NAME=`basename $TARGET_URL`
ARCHIVE_FILE=$BIN_DIR/$ARCHIVE_NAME
FOLDER_NAME=`basename $ARCHIVE_NAME .tar.gz`
FOLDER=$BIN_DIR/$FOLDER_NAME
if [ ! -e $ARCHIVE_FILE ]; then
    wget $TARGET_URL -P $BIN_DIR
fi
tar xf $ARCHIVE_FILE -C $BIN_DIR
cd $FOLDER
./configure
make
make install
