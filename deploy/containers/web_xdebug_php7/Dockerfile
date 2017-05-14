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

RUN apt-get install -y curl git zip unzip php7.0 php7.0-cli php7.0-curl php7.0-mysql libapache2-mod-php7.0 php-xdebug mcrypt php7.0-mcrypt php7.0-simplexml php7.0-zip php-redis

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer self-update

RUN    echo "" >> /etc/php/7.0/cli/php.ini \
    && echo "[xdebug]" >> /etc/php/7.0/cli/php.ini \
    && echo 'zend_extension="/usr/lib/php/20151012/xdebug.so"' >> /etc/php/7.0/cli/php.ini \
    && echo "xdebug.profiler_output_dir=/tmp/profiler" >> /etc/php/7.0/cli/php.ini \
    && echo "xdebug.profiler_enable=1" >> /etc/php/7.0/cli/php.ini \
    && echo "xdebug.remote_enable=1" >> /etc/php/7.0/cli/php.ini \
    && echo "xdebug.remote_host=172.17.0.1" >> /etc/php/7.0/cli/php.ini \
    && echo "xdebug.remote_port=9000" >> /etc/php/7.0/cli/php.ini \
    && echo "xdebug.remote_handler=dbgp" >> /etc/php/7.0/cli/php.ini \
    && echo "xdebug.idekey=PHPSTORM" >> /etc/php/7.0/cli/php.ini \
    && echo "xdebug.max_nesting_level=500" >> /etc/php/7.0/cli/php.ini

RUN    echo "" >> /etc/php/7.0/apache2/php.ini \
    && echo "[xdebug]" >> /etc/php/7.0/apache2/php.ini \
    && echo 'zend_extension="/usr/lib/php/20151012/xdebug.so"' >> /etc/php/7.0/apache2/php.ini \
    && echo "xdebug.profiler_output_dir=/tmp/profiler" >> /etc/php/7.0/apache2/php.ini \
    && echo "xdebug.profiler_enable=1" >> /etc/php/7.0/apache2/php.ini \
    && echo "xdebug.remote_enable=1" >> /etc/php/7.0/apache2/php.ini \
    && echo "xdebug.remote_host=172.17.42.1" >> /etc/php/7.0/apache2/php.ini \
    && echo "xdebug.remote_port=9000" >> /etc/php/7.0/apache2/php.ini \
    && echo "xdebug.remote_handler=dbgp" >> /etc/php/7.0/apache2/php.ini \
    && echo "xdebug.idekey=PHPSTORM" >> /etc/php/7.0/apache2/php.ini \
    && echo "xdebug.remote_autostart=1" >> /etc/php/7.0/apache2/php.ini \
    && echo "xdebug.max_nesting_level=500" >> /etc/php/7.0/apache2/php.ini

ADD scripts/startup.sh /startup.sh

RUN useradd oceansmhealth -p EYTs1s171

VOLUME /var/www/oceansmhealth/

EXPOSE 8080

CMD ["/bin/bash", "/startup.sh"]
