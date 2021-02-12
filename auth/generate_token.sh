#!/bin/sh

source ~/.bashrc

if [ $1 == "@destroy" ]
then
  echo "undefinedd" > $AM_LOCATION/auth/secure.token
  exit;
fi

TOKEN=$(date | md5sum | awk '{print substr($0,0,5)}')

#destroy token after 5 minutes (5 * 60 = 300)
DELAY=300

echo $TOKEN > $AM_LOCATION/auth/secure.token
#echo $TOKEN > secure.token & sleep $DELAY; echo "undefined" > secure.token
