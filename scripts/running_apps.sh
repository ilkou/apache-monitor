#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################
# Script shell to check running apps

source ~/.bashrc

APPS_LENGTH=$(cat $AM_LOCATION/config.json | jq '.apps | length')

for (( row=0; row<$APPS_LENGTH; row++ ))
do
	AM_app_link=$(cat $AM_LOCATION/config.json | jq -r ".apps[$row] | values.url")
	AM_app_string=$(cat $AM_LOCATION/config.json | jq -r ".apps[$row] | values.string")
	if [[ ! $(curl -Lqs $AM_app_link | grep $AM_app_string) ]]; then
		
		AM_app_notified=$(cat $AM_LOCATION/config.json | jq -r ".apps[$row].notified")

		if [[ "$AM_app_notified" = "yes" ]]; then
			continue
		fi

		echo App $AM_app_link is down
		#set variables
		AM_SMS_TOKEN=$(cat $AM_LOCATION/config.json | jq -r '.sms_api_token')

		AM_SMS_TEL=$(cat $AM_LOCATION/config.json | jq -r '.sms_api_tel')

		AM_SMS_CONTENT="App $AM_app_link is down"
		AM_SMS_CONTENT_HTML="App $AM_app_link is <strong>down</strong>"
		
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
		php $AM_LOCATION/scripts/setNotif.php apps $row yes
	elif
		php $AM_LOCATION/scripts/setNotif.php apps $row no
	fi
	
done
