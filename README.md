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

* Check disk space with df ✅ => disk free

* Check running processes for => apache - tomcat - mysql ✅

* Push notifications (SMS) ❌ => platform API integration

* Check running apps (wget/curl) ✅


## Technologies:

`Script Shell` `PHP`/`Java`

### SMS

* [SMS Server Tools 3](http://smstools3.kekekasvi.com/) - needs a GSM modem

* email-to-sms gateway

### Inspiration

* [Monit](https://mmonit.com/monit/#screenshots) - screenshots of the tool
