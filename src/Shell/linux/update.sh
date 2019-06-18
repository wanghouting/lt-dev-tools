#!/bin/bash

if [[ $# != 1 ]];then

    echo  'error: need 1 param for path'
    exit
fi

echo "---cd $1"
cd $1

echo "---git pull"

git pull -f

