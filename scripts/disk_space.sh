#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################


AM_percentage=$(cat config.json | jq -r '.percentage')

CURRENT=$(df / | grep / | awk '{ print $5}' | sed 's/%//g')

if [ "$CURRENT" -gt "$AM_percentage" ] ; then

	echo Your root partition remaining free space is critically low. Used: $CURRENT%

fi
