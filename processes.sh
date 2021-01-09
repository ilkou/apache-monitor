#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################
# Script shell to check running processes

source ./config

for key in "${!AM_services[@]}"; do
#	if systemctl list-unit-files | grep $key > /dev/null
#	then
		nbr_process=$(ps -ef | grep "$key" | wc -l)
		if [ "$nbr_process" -eq "1" ]
		then
			echo "$key is down" | mail -s "$key" root
		fi
#	fi
done
