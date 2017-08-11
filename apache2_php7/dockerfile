FROM ubuntu:16.04

RUN apt-get update && apt-get -y -qq install apache2 software-properties-common supervisor && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php

RUN apt-get update && apt-get install -y -qq libapache2-mod-php7.0 php7.0 php7.0-cli php7.0-curl php7.0-dev php7.0-gd php7.0-imap php7.0-mbstring php7.0-mcrypt php7.0-mysql php7.0-pgsql php7.0-pspell php7.0-xml php7.0-xmlrpc php-apcu php-memcached php-pear php-redis && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

COPY conf/000-default.conf /etc/apache2/sites-available/000-default.conf

COPY conf/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY script/run.sh /run.sh
RUN chmod 755 /run.sh

COPY conf/config /config
COPY conf/dir.conf /etc/apache2/mods-available/dir.conf

COPY code/index.php /var/www/html/index.php
COPY code/login.php /var/www/html/login.php
COPY code/file.php /var/www/html/file.php
COPY code/write.php /var/www/html/write.php
COPY code/view.php /var/www/html/view.php
COPY code/download.php /var/www/html/download.php

EXPOSE 80

CMD ["/run.sh"]
