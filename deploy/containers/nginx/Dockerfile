# Version: 0.0.1

FROM ubuntu:16.04
MAINTAINER Eugene Pristupa <pre@ciklum.com>

RUN apt-get update
RUN apt-get install -y nginx

COPY conf/default /etc/nginx/sites-enabled/default
RUN chown root /etc/nginx/sites-enabled/default
RUN chgrp root /etc/nginx/sites-enabled/default
RUN chmod 0644 /etc/nginx/sites-enabled/default

ADD scripts/startup.sh /startup.sh

RUN useradd oceansmhealth -p EYTs1s171

VOLUME /var/www/oceansmhealth/

EXPOSE 80

CMD ["/bin/bash", "/startup.sh"]