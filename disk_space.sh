#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################

source ~/.bashrc
source $AM_LOCATION/config

CURRENT=$(df / | grep / | awk '{ print $5}' | sed 's/%//g')

if [ "$CURRENT" -gt "$AM_percentage" ] ; then

	mail -s 'Disk Space Alert' apache.monitor.ensakh@gmail.com << EOF

Your root partition remaining free space is critically low. Used: $CURRENT%

EOF

fi
