#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################
# Script shell to free up space

source ~/.bashrc

TOKEN=$1
FILE_NBR=$2

SECURE_TOKEN=$(cat $AM_LOCATION/auth/secure.token)
if [ "$TOKEN" = "$SECURE_TOKEN" ]; then
  #Cleanup YUM cache
  #yum clean all
  #rm -rf /var/cache/yum
  #rm -rf /var/tmp/yum-*
  #Remove orphan packages
  #package-cleanup --quiet --leaves 
  #package-cleanup --quiet --leaves | xargs yum remove -y
  #Remove WP CLI cached WordPress downloads
  #rm -rf /root/.wp-cli/cache/*
  #rm -rf /home/*/.wp-cli/cache/*
  #Remove core dumps
  #If you had some severe failures with PHP which caused it to segfault and had core dumps enabled, chances are – you have quite a few of those.
  #They are not needed after you done debugging the problem. So:
  #find -regex ".*/core\.[0-9]+$" -delete
  #Remove Mock caches
  #rm -rf /var/cache/mock/* /var/lib/mock/*
	#AM_service=$(cat $AM_LOCATION/config.json | jq -r ".services[$SERVICE_NBR].service")
	#systemctl restart $AM_service
  file_to_delete=$(awk "NR==${FILE_NBR}" $AM_LOCATION/.files | awk '{print $2}')
  #rm -rf $file_to_delete
  $AM_LOCATION/auth/generate_token.sh @destroy
  
  #change service in json file to notified no
  php $AM_LOCATION/scripts/setNotif.php disk_space no
  #disk_space_location="sh $AM_LOCATION/scripts/disk_space.sh"
  #sh $AM_LOCATION/scripts/set_cron_job.sh "$disk_space_location" @every_min

fi
