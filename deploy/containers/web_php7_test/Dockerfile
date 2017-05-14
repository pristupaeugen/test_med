# Version: 0.0.1

FROM ubuntu:16.04
MAINTAINER Eugene Pristupa <pre@ciklum.com>

RUN sed -i'' 's/archive\.ubuntu\.com/us\.archive\.ubuntu\.com/' /etc/apt/sources.list
RUN apt-get update

RUN apt-get install -y apache2

RUN rm /etc/apache2/sites-enabled/000-default.conf
COPY conf/000-default.conf /etc/apache2/sites-enabled/
RUN chown root /etc/apache2/sites-enabled/000-default.conf
RUN chgrp root /etc/apache2/sites-enabled/000-default.conf
RUN chmod 0644 /etc/apache2/sites-enabled/000-default.conf

RUN rm /etc/apache2/ports.conf
COPY conf/ports.conf /etc/apache2/ports.conf
RUN chown root /etc/apache2/ports.conf
RUN chgrp root /etc/apache2/ports.conf
RUN chmod 0644 /etc/apache2/ports.conf

RUN a2enmod rewrite

RUN apt-get install -y curl git zip unzip php7.0 php7.0-cli php7.0-curl php7.0-mysql libapache2-mod-php7.0 mcrypt php7.0-mcrypt php7.0-simplexml php7.0-zip php-redis

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer self-update

ADD scripts/startup.sh /startup.sh

RUN useradd oceansmhealth -p EYTs1s171

VOLUME /var/www/test/

EXPOSE 8081

CMD ["/bin/bash", "/startup.sh"]
