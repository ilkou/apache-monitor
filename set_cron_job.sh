#!/bin/sh
if [ -z "$1" ]
then
	echo "Usage: ./set_cron_job.sh command_to_run"
	exit;
fi

commnd=$1
cron_file="/var/spool/cron/root"
if [ -z "$2" ]
then
	printf "\n\t(1) Run task occasionally (specific entry)    "
	printf "\n\t(2) Run once a year at midnight of 1 January (yearly)    "
	printf "\n\t(3) Run once a month at midnight of the first day of the month(monthly)    "
	printf "\n\t(4) Run once a week at midnight on Sunday morning(weekly)    "
	printf "\n\t(5) Run once a day at midnight(daily)    "
	printf "\n\t(6) Run once an hour at the beginning of the hour(hourly)    "
	printf "\n\t(7) Run at startup(reboot)\n\t\t\t\t\t    "
	while :
	do
		read crnn
		case $crnn in
			1)
				read -p "type the day of the week (0 - 6) (Sunday to Saturday) - ps: '*' to run everyday) :   " ldoweek
				read -p "type the month (1 - 12) - ps: '*' to run every month) :   " lmonth
				read -p "type the day of the month (1 - 31) - ps: '*' to run every day of the month) :   " ldomonth
				read -p "type the hour (0 - 23) - ps: '*' to run every hour :   " lhour
				read -p "type the minute (0 - 59) - ps: '*' to run every minute :   " lminute
				echo "$lminute $lhour $ldomonth $lmonth $ldoweek $commnd" >> $cron_file
				break
				;;
			2)
				echo "@yearly $commnd" >> $cron_file
				break
				;;
			3)
				echo "@monthly $commnd" >> $cron_file
				break
				;;
			4)
				echo "@weekly $commnd" >> $cron_file
				break
				;;
			5)
				echo "@daily $commnd" >> $cron_file
				break
				;;
			6)
				echo "@hourly $commnd" >> $cron_file
				break
				;;
			7)
				echo "@reboot $commnd" >> $cron_file
				break
				;;
			*)
				printf "\nchoose a number between 1 and 7  :   "
				;;
		esac
	done
else
	if [ $2 == "@every_min" ]
	then
		echo "* * * * * $commnd" >> $cron_file
	else
		echo "Usage: ./set_cron_job.sh command_to_run @every_min"
		exit;
	fi
fi
