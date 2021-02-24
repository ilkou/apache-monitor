# [apache-monitor](https://github.com/ilkou/apache-monitor) &middot; [![made-with-bash](https://img.shields.io/badge/Made%20with-Bash-1f425f.svg)](https://www.gnu.org/software/bash/) [![made-with-Go](https://img.shields.io/badge/Made%20with-Go-1f425f.svg)](http://golang.org) [![Maintenance](https://img.shields.io/badge/Maintained%3F-no-red.svg)](https://bitbucket.org/lbesson/ansi-colors) [![Ask Me Anything !](https://img.shields.io/badge/Ask%20me-anything-1abc9c.svg)](https://ilkou.github.io) [![GitHub contributors](https://img.shields.io/github/contributors/ilkou/apache-monitor)](https://github.com/ilkou/apache-monitor/graphs/contributors)


A tool for the supervision and management of a server. The tool monitors the proper functioning of apache, and the availability of a web application, it also monitors the use of disk space and notifies the administrator in case of malfunction.

## Env

We are using:

* [CentOS 7](https://pixelabs.fr/machine-virtuelle-centos-7-virtualbox/) as an OS for dev/prod

* [Apache Web Server](https://www.digitalocean.com/community/tutorials/how-to-install-the-apache-web-server-on-centos-7) to host apache monitor web application

## To Run apache-monitor

`
sh index.sh
`

Or

`
sh index.sh -y
`

* option -y: Automatic yes to prompts; assume "yes" as answer to all prompts and run non-interactively.



## Features

* The use of disk space ✅

* Monitoring of services: apache - tomcat - mysql ✅

* Push notifications (SMS) with D7SMS API ✅

* Monitoring of the installed web apps (curl) ✅

* Dashboard to visualize "CPU/disk space/.." usage

### In future releases

* apache-monitor for ubuntu/debian

* verfiy if app is down for everyone: [using this API](https://downforeveryoneorjustme.com)

## Technologies:

`Script Shell` `PHP`

## Notes

* Check running processes & Push notifications are stop-gap solutions.

* Test some features with docker:

`
docker run -v /path/to/apache-monitor/:/apache-monitor -it --rm --name apache-monitor centos:7
`

## Resources

### SMS

* [SMS Server Tools 3](http://smstools3.kekekasvi.com/) - needs a GSM modem

* email-to-sms gateway

* [Free SMS APIs](https://rapidapi.com/collection/free-sms-apis)

* [Twilio](https://www.twilio.com/sms)

* [VONAGE API](https://dashboard.nexmo.com/getting-started/sms)

* [D7SMS API](https://dashboard.d7networks.com/)

* [SMS77](https://app.sms77.io/)

### Inspiration

* [Monit](https://mmonit.com/monit/#screenshots) - screenshots of the tool

### JQ (json filter)

* [JQ filter](https://jqplay.org/)

* [JQ Home](https://stedolan.github.io/jq/)

