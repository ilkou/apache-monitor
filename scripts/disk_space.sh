#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################

source ~/.bashrc

AM_percentage=$(cat $AM_LOCATION/config.json | jq -r '.percentage')

CURRENT=$(df / | grep / | awk '{ print $5}' | sed 's/%//g')

AM_disk_space_notified=$(cat $AM_LOCATION/config.json | jq -r '.disk_space_notified')

if [[ "$AM_disk_space_notified" = "yes" ]]; then
	exit;
fi

if [ "$CURRENT" -gt "$AM_percentage" ] ; then
	
	echo Your root partition remaining free space is critically low. Used: $CURRENT%
	
	#set variables
	AM_SMS_TOKEN=$(cat $AM_LOCATION/config.json | jq -r '.sms_api_token')

	AM_SMS_TEL=$(cat $AM_LOCATION/config.json | jq -r '.sms_api_tel')

	AM_SMS_FILE_1=$(awk "NR==1" $AM_LOCATION/.files | awk '{print $2}' | rev | cut -d '/' -f 1 | rev)
	AM_SMS_FILE_2=$(awk "NR==2" $AM_LOCATION/.files | awk '{print $2}' | rev | cut -d '/' -f 1 | rev)
	AM_SMS_FILE_3=$(awk "NR==3" $AM_LOCATION/.files | awk '{print $2}' | rev | cut -d '/' -f 1 | rev)

	AM_MY_IP=$(curl ifconfig.me)

	$AM_LOCATION/auth/generate_token.sh
	SECURE_TOKEN=$(cat $AM_LOCATION/auth/secure.token)

	AM_WEBHOOK_URL="${AM_MY_IP}:1337/hooks/f?t=${SECURE_TOKEN}&f="

	AM_SMS_CONTENT="Your disk is full\n1)Delete ${AM_SMS_FILE_1}: ${AM_WEBHOOK_URL}1\n2)Delete ${AM_SMS_FILE_2}: ${AM_WEBHOOK_URL}2\n3)Delete ${AM_SMS_FILE_3}: ${AM_WEBHOOK_URL}3"
	AM_SMS_CONTENT_HTML="Your disk is full<br/>1)Delete ${AM_SMS_FILE_1}: ${AM_WEBHOOK_URL}1<br/>2)Delete ${AM_SMS_FILE_2}: ${AM_WEBHOOK_URL}2<br/>3)Delete ${AM_SMS_FILE_3}: ${AM_WEBHOOK_URL}3<br/>"
	
	#find 3 largest files
	find / -type f -exec du -S {} + | sort -rh | head -n 3 2>/dev/null 1>$AM_LOCATION/.files
	
	#send mail
	cd $AM_LOCATION/mail
	php sendmail.php $(cat $AM_LOCATION/config.json | jq -r '.email') "Disk Full" "${AM_SMS_CONTENT_HTML}" "${AM_SMS_CONTENT}"
	cd -
	#send sms
	curl -X POST \
	https://rest-api.d7networks.com/secure/send \
	-H "Authorization: Basic ${AM_SMS_TOKEN}" \
	-H 'Content-Type: application/json' \
	-H 'Postman-Token: e747d85c-21d3-411c-acf5-f93d2977598b' \
	-H 'cache-control: no-cache' \
	-d "{\"to\":\"${AM_SMS_TEL}\",\"content\":\"${AM_SMS_CONTENT}\",\"from\":\"smsinfo\"}"

	#change service in json file to notified yes
	php $AM_LOCATION/scripts/setNotif.php disk_space yes
	#grep -v "disk_space.sh" $AM_cron_file > am_file.tmp && cat am_file.tmp > $AM_cron_file && rm -rf am_file.tmp

fi
