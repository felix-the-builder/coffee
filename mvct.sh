#!/bin/bash
mv /etc/crontab /etc/crontab.old
cd /var/www/html/tmp
cp ./crontab /etc/crontab
