#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################
# Script shell to check dependencies for Apache-monitor tool

source ~/.bashrc

echo "Checking dependencies for Apache-monitor tool";

#sudo yum update -y
sudo yum install epel-release -y
sudo yum install jq -y

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
	source ~/.bashrc
	AM_command=$(cat $AM_LOCATION/config.json | jq ".dependencies[$1] | keys[]")
	echo "Checking $AM_command command...";
	if ! command -v $AM_command &> /dev/null
	then
		echo "=> $AM_command: could not be found !";
		if [ "$AM_auto_install" = false ] ; then
			printf "Do you want to install $AM_command ? "
			while :
			do
				read yn
				case $yn in
					[Yy]* ) 
						COMMANDS_LENGTH=$(cat $AM_LOCATION/config.json | jq ".dependencies[$1][] | length")
						for (( col=0; col<$COMMANDS_LENGTH; col++ ))
						do
							command=$(cat $AM_LOCATION/config.json | jq -r ".dependencies[$1][] | .[$col]")
							eval "$command"
						done
						break;;
					[Nn]* ) echo "Apache-monitor depends on it !"; exit;;
					* ) printf "Please answer yes or no [yn]:  ";;
				esac
			done
		else
			COMMANDS_LENGTH=$(cat $AM_LOCATION/config.json | jq ".dependencies[$1][] | length")
			for (( col=0; col<$COMMANDS_LENGTH; col++ ))
			do
				command=$(cat $AM_LOCATION/config.json | jq -r ".dependencies[$1][] | .[$col]")
				eval "$command"
			done
		fi
	else
		echo "=> $AM_command: already installed !";
	fi
}

DEPENDENCIES_LENGTH=$(cat $AM_LOCATION/config.json | jq '.dependencies | length')

for (( row=1; row<$DEPENDENCIES_LENGTH; row++ ))
do
	check_dependency $row
done
