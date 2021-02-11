#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################
# Script shell to restart service

source ~/.bashrc

TOKEN=$1
SERVICE_NBR=$2

SECURE_TOKEN=$(cat $AM_LOCATION/auth/secure.token)

if [ "$TOKEN" = "$SECURE_TOKEN" ]; then
	AM_service=$(cat $AM_LOCATION/config.json | jq -r ".services[$SERVICE_NBR].service")
	systemctl restart $AM_service
fi
