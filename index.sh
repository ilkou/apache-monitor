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
	sh dependencies.sh
else
	sh dependencies.sh -y
fi

set_cron()
{
printf "Do you want to set the cron Job manually ? "
while :
do
	read yn
	case $yn in
		[Yy]* ) sh set_cron_job.sh "$1" ; break;;
		[Nn]* ) sh set_cron_job.sh "$1" @every_min; break;;
		* ) printf "Please answer yes or no [yn]:    ";;
	esac
done
}

# Setting disk space parameters
disk_space_location="sh $(pwd)/disk_space.sh"
printf "${AM_color_blue}[INFO] Apache-monitor will notify you whenever your remaining free space is critically low\n"
printf "[INFO] You can set the minimum percentage of used space in the ./config file\n"
printf "[INFO] In order to do that we will set a Cron Job to schedule the task (of verification) to run at a specific time\n${AM_color_normal}"
set_cron $disk_space_location

# Check running web apps
check_apps_location="sh $(pwd)/running_apps.sh"
printf "${AM_color_blue}[INFO] Apache-monitor will verify if a string exist within a wep app index page (or other pages)\n"
printf "[INFO] You can set the links to pages and their corresponding string verification in the ./config file\n"
printf "[INFO] Apache-monitor won\'t verify firewall rules, therefore they need to be configured manually (enable a port for outside connections)\n${AM_color_normal}"
set_cron $check_apps_location

# Check running processes
check_processes_location="sh $(pwd)/processes.sh"
printf "${AM_color_blue}[INFO] Apache-monitor will detect available services within the system and keey an eye on \'em\n"
printf "[INFO] Supported services are already mentioned in the ./config file (Apache, Tomcat, Mysql)\n"
printf "Others can be added in the upcoming releases\n${AM_color_normal}"
set_cron $check_processes_location
