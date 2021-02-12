# apache-monitor

Développement d'un outil pour la supervision et la gestion d'un serveur. L'outil surveille le bon fonctionnement d'apache, et la disponibilité d'une application web, il surveille aussi l'utilisation de l'espace disque et notifie l'administrateur en cas de dysfonctionnement.

## Test

`
sh index.sh
`

Or

`
sh index.sh -y
`

* option -y: Automatic yes to prompts; assume "yes" as answer to all prompts and run non-interactively.

## Env

* [CentOS 7](https://pixelabs.fr/machine-virtuelle-centos-7-virtualbox/)

* [Apache Web Server](https://www.digitalocean.com/community/tutorials/how-to-install-the-apache-web-server-on-centos-7)

## TO-DO

* Check disk space with df ✅ 

* Check running processes for => apache - tomcat - mysql ✅

* Push notifications (SMS) ✅ => D7SMS API

* Check running apps (wget/curl) ✅


## Technologies:

`Script Shell` `PHP`/`Java`

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

### TO ADD

verfiy if app is down for everyone: [using this API](https://downforeveryoneorjustme.com)

### Test some features with docker

`
docker run -v /path/to/apache-monitor/:/apache-monitor -it --rm --name apache-monitor centos:7
`
