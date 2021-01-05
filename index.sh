#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################

AM_auto_install=false;

if [ -z "$AM_LOCATION" ]
then
	echo "export AM_LOCATION=\"$(pwd)\"" >> ~/.bashrc
	source ~/.bashrc
fi

while getopts ":y" opt; do
	case $opt in
		y)
			AM_auto_install=true;
			;;
		\?)
			echo "Invalid option: -$OPTARG"; >&2
			;;
	esac
done

if [ "$AM_auto_install" = false ] ; then
	sh dependencies.sh
else
	sh dependencies.sh -y
fi

# Setting disk space parameters
disk_space_location="sh $(pwd)/disk_space.sh"
printf "Apache-monitor will notify you whenever your remaining free space is critically low\n"
printf "You can set the minimum percentage of used space in the ./config file\n"
printf "In order to do that we will set a Cron Job to schedule the task (of verification) to run at a specific time\n"
read -p "Do you want to set the cron Job manually ? " yn
while true; do
	case $yn in
		[Yy]* ) sh set_cron_job.sh "$disk_space_location" ; break;;
		[Nn]* ) sh set_cron_job.sh "$disk_space_location" @every_min; break;;
		* ) echo "Please answer yes or no.";;
	esac
done
