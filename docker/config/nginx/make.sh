#!/usr/bin/env bash
envsubst '${DOCUMENT_ROOT} ${PHP_FPM_HOST}}' < /var/tmp/nginx/site.conf > /etc/nginx/conf.d/site.conf