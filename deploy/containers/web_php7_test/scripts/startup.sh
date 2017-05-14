#!/bin/bash

rsyslogd &

cron -f &

/usr/sbin/apache2ctl -D FOREGROUND &

su oceansmhealth