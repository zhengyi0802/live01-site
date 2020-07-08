#!/bin/bash

sudo apt-get update -y
sudo apt-get upgrade -y
sudo apt-get install nginx-full libnginx-mod-rtmp php-fpm php-curl php-intl php-mbstring git curl

sudo cp /etc/nginx/nginx.conf /etc/nginx/nginx.conf.default
sudo cp /etc/nginx/sites-available/default /etc/nginx/sites-available/default.bak
sudo cp ../etc/nginx/nginx.conf /etc/nginx/nginx.conf
sudo cp ../etc/nginx/sites-available/default /etc/nginx/sites-available/default
sudo cp -dpR ../var/www/html /var/www/
sudo cp -dpR ../var/www/localhost /var/www/
sudo systemctl restart nginx





