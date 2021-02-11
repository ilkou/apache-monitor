#!/bin/sh
#################################################################
#                                                               #
#                                                               #
#                       Apache-monitor                          #
#                                                               #
#                                                               #
#################################################################
# Script shell to check running services

source ~/.bashrc

SERVICES_LENGTH=$(cat $AM_LOCATION/config.json | jq '.services | length')

for (( row=0; row<$SERVICES_LENGTH; row++ ))
do
        AM_service=$(cat $AM_LOCATION/config.json | jq -r ".services[$row].service")
        AM_service_status=$(cat $AM_LOCATION/config.json | jq -r ".services[$row].status")
        if [[ "$AM_service_status" = "enabled" ]]; then

                AM_service_notified=$(cat $AM_LOCATION/config.json | jq -r ".services[$row].notified")

		if [[ "$AM_service_notified" = "yes" ]]; then
			continue
		fi
                
                #systemctl is-active --quiet $AM_service || echo Service $AM_service is not running

                if ! systemctl is-active --quiet $AM_service ; then
                        #set variables
                        AM_SMS_TOKEN=$(cat $AM_LOCATION/config.json | jq -r '.sms_api_token')

                        AM_SMS_TEL=$(cat $AM_LOCATION/config.json | jq -r '.sms_api_tel')

                        AM_SMS_CONTENT="App $AM_service is down"
                        AM_SMS_CONTENT_HTML="App $AM_service is <strong>down</strong>"
                        
                        #send mail
                        php mail/sendmail.php $(cat $AM_LOCATION/config.json | jq -r '.email') "App down" "${AM_SMS_CONTENT_HTML}" "${AM_SMS_CONTENT}"
                        
                        #send sms
                        curl -X POST \
                        https://rest-api.d7networks.com/secure/send \
                        -H "Authorization: Basic ${AM_SMS_TOKEN}" \
                        -H 'Content-Type: application/json' \
                        -H 'Postman-Token: e747d85c-21d3-411c-acf5-f93d2977598b' \
                        -H 'cache-control: no-cache' \
                        -d "{\"to\":\"${AM_SMS_TEL}\",\"content\":\"${AM_SMS_CONTENT}\",\"from\":\"smsinfo\"}"

                        #change service in json file to notified yes
                        php $AM_LOCATION/scripts/setNotif.php services $row yes
                elif
                        php $AM_LOCATION/scripts/setNotif.php services $row no
                fi
        fi
done
