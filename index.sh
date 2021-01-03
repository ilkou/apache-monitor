#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################

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

if [ "$AM_auto_install" = false ] ; then
	sh dependencies.sh
else
	sh dependencies.sh -y
fi
