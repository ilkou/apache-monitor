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

for key in "${!AM_webapps[@]}"; do
	if [[ ! $(curl -Lqs $key | grep ${AM_webapps[$key]}) ]]; then
		mail -s 'Web App Alert' apache.monitor.ensakh@gmail.com << EOF

Your web app under this link: $key is not running properly

EOF
	fi
done
