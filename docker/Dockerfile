FROM php:8.2-fpm

RUN apt-get update \
    && addgroup --gid 1000 developer \
    && adduser --uid 1000 --gid 1000 developer \
    && usermod -a -G developer www-data \
    && apt-get install -y zip unzip git-core \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update

# Install xdebug
RUN pecl install xdebug
ENV XDEBUG_SESSION phpstorm
ENV PHP_IDE_CONFIG serverName=console

## entrypoint
COPY entrypoint.sh /usr/local/bin/entrypoint
RUN chmod 777 /usr/local/bin/entrypoint
ENTRYPOINT ["entrypoint"]
CMD ["php-fpm"]