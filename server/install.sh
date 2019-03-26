# Installation process on ubuntu

sudo apt-get update
sudo apt-get upgrade
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get -y install apache2 libapache2-mod-php7.2 php7.2 php7.2-xml php7.2-gd php7.2-opcache php7.2-mbstring
sudo apt-get -y install php-mysql
cd /tmp
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
