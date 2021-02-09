#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################
# Script shell to check running apps

APPS_LENGTH=$(cat config.json | jq '.apps | length')

for (( row=0; row<$APPS_LENGTH; row++ ))
do
	AM_app_link=$(cat config.json | jq -r ".apps[$row] | keys[]")
	AM_app_string=$(cat config.json | jq -r ".apps[$row] | values[]")
	if [[ ! $(curl -Lqs $AM_app_link | grep $AM_app_string) ]]; then
		echo App $AM_app_link is down
	fi
done
