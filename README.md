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

## TO-DO

* Check disk space with df

* Check running processes for => apache - tomcat - mysql

* Push notifications (SMS)

* Check running apps (wget/curl)


## Technologies:

`Script Shell` `PHP`/`Java`

### SMS

* [SMS Server Tools 3](http://smstools3.kekekasvi.com/) - needs a GSM modem

* email-to-sms gateway

### Inspiration

* [Monit](https://mmonit.com/monit/#screenshots) - screenshots of the tool
