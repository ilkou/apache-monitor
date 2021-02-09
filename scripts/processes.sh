#!/bin/sh
#################################################################
#                                                               #
#                                                               #
#                       Apache-monitor                          #
#                                                               #
#                                                               #
#################################################################
# Script shell to check running services

SERVICES_LENGTH=$(cat config.json | jq '.services | length')

for (( row=0; row<$SERVICES_LENGTH; row++ ))
do
        AM_service=$(cat test.json | jq -r ".services[$row]")
        systemctl is-active --quiet $AM_service || echo Service $AM_service is not running
done
