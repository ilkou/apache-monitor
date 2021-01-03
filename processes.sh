#!/bin/sh
#################################################################
#								#
#								#
#			Apache-monitor				#
#								#
#								#
#################################################################
# Script shell to check running processes

source ./config

echo "Checking running processes";

#Tomcat
kill -0 `cat $CATALINA_PID` > /dev/null 2>&1
if [ $? -gt 0 ]
then
    echo "Check tomcat" | mailx -s "Tomcat not running" apache-monitor@gmail.com
fi


