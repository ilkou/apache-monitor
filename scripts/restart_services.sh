#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################
# Script shell to restart service

TOKEN=$1
SERVICE_NBR=$2

SECURE_TOKEN=$(cat ./auth/secure.token)


if [ "$TOKEN" = "$SECURE_TOKEN" ]; then
	AM_service=$(cat config.json | jq -r ".services[$SERVICE_NBR]")
	systemctl restart $AM_service
fi
