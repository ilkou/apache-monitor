#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################

AM_auto_install=false;

AM_color_black=$(tput setaf 0)
AM_color_red=$(tput setaf 1)
AM_color_green=$(tput setaf 2)
AM_color_yellow=$(tput setaf 3)
AM_color_blue=$(tput setaf 4)
AM_color_magenta=$(tput setaf 5)
AM_color_cyan=$(tput setaf 6)
AM_color_white=$(tput setaf 7)
AM_color_normal=$(tput sgr0)

source ~/.bashrc
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
	sh scripts/dependencies.sh
else
	sh scripts/dependencies.sh -y
fi

set_cron()
{
printf "Do you want to set the cron Job manually ? "
while :
do
	read yn
	case $yn in
		[Yy]* ) sh scripts/set_cron_job.sh "$1" ; break;;
		[Nn]* ) sh scripts/set_cron_job.sh "$1" @every_min; break;;
		* ) printf "Please answer yes or no [yn]:    ";;
	esac
done
}

# Setting disk space parameters
disk_space_location="sh $AM_LOCATION/scripts/disk_space.sh"
printf "${AM_color_blue}[INFO] Apache-monitor will notify you whenever your remaining free space is critically low\n"
printf "[INFO] You can set the minimum percentage of used space in the ./config file\n"
printf "[INFO] In order to do that we will set a Cron Job to schedule the task (of verification) to run at a specific time\n${AM_color_normal}"
set_cron "$disk_space_location"

# Check running web apps
check_apps_location="sh $AM_LOCATION/scripts/running_apps.sh"
printf "${AM_color_blue}[INFO] Apache-monitor will verify if a string exist within a wep app index page (or other pages)\n"
printf "[INFO] You can set the links to pages and their corresponding string verification in the ./config file\n"
printf "[INFO] Apache-monitor won\'t verify firewall rules, therefore they need to be configured manually (enable a port for outside connections)\n${AM_color_normal}"
set_cron "$check_apps_location"

# Setting availabled services to monitor

#for key in "${!AM_services[@]}"; do
#	if systemctl list-unit-files | grep $key; then
#		AM_services[$key]=true;
#	fi
#	echo "$key => ${AM_services[$key]}";
#done

# Check running processes
check_processes_location="sh $AM_LOCATION/scripts/processes.sh"
printf "${AM_color_blue}[INFO] Apache-monitor will detect available services within the system and keey an eye on \'em\n"
printf "[INFO] Supported services are already mentioned in the ./config file (Apache, Tomcat, Mysql)\n"
printf "Others can be added in the upcoming releases\n${AM_color_normal}"
set_cron "$check_processes_location"

# Activate hooks
printf "${AM_color_blue}[INFO] Apache-monitor will auto fix some issues using webhooks\n"
printf "[INFO] You need to open ports 1337 and 1338\n"
printf "[INFO] The URLs used by webhooks (in 1337 and 1338 ports) are secured with auto generated tokens\n"
printf "[INFO] These tokens will be destroyed automatically after fixing the issue\n${AM_color_normal}"

webhook -hooks /home/ubuntu/hooks/free_space_hook.json -port 1337 -verbose &
webhook -hooks /home/ubuntu/hooks/restart_services_hook.json -port 1338 -verbose &

cron_file=$(cat $AM_LOCATION/config.json | jq -r '.cron_location')
echo "@reboot webhook -hooks /home/ubuntu/hooks/free_space_hook.json -port 1337 -verbose &" >> $cron_file
echo "@reboot webhook -hooks /home/ubuntu/hooks/restart_services_hook.json -port 1338 -verbose &" >> $cron_file

# Set up website

ln -s $AM_LOCATION /var/www/html

printf "${AM_color_yellow}[NOTE] Get your sms api token from https://dashboard.d7networks.com/\n${AM_color_normal}"
printf "${AM_color_blue}[INFO] Check out https://github.com/ilkou/apache-monitor for updates !\n${AM_color_normal}"
printf "${AM_color_green}[SUCCESS] Apache-monitor is installed successfully\n${AM_color_normal}"