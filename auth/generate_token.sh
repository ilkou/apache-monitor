#!/bin/sh

TOKEN=$(date | md5sum | awk '{print substr($0,0,5)}')

#destroy token after 5 minutes (5 * 60 = 300)
DELAY=10

echo $TOKEN > secure.token & sleep $DELAY; echo "undefined" > secure.token
