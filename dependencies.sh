#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################
# Script shell to check dependencies for Apache-monitor tool

source ./config

echo "Checking dependencies for Apache-monitor tool";

AM_auto_install=false;

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

check_dependency()
{
	AM_command_name=$1
	AM_command=$2
	echo "Checking $AM_command_name command...";
	if ! command -v $AM_command &> /dev/null
	then
		echo "=> $AM_command_name: could not be found !";
		if [ "$AM_auto_install" = false ] ; then
			read -p "Do you want to install $AM_command_name ? " yn
			while true; do
				case $yn in
					[Yy]* ) eval "yum install $AM_command -y" ; break;;
					[Nn]* ) echo "Apache-monitor depends on it !"; exit;;
					* ) echo "Please answer yes or no.";;
				esac
			done
		else
			eval "yum install $AM_command -y"
		fi
	else
		echo "=> $AM_command_name: already installed !";
	fi
}

for key in "${!AM_dependencies[@]}"; do
	check_dependency $key ${AM_dependencies[$key]}
done

for key in "${!AM_services[@]}"; do
	if systemctl list-unit-files | grep $key; then
		AM_services[$key]=true;
	fi
	echo "$key => ${AM_services[$key]}";
done
