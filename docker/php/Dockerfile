FROM php:7.2.9-apache

RUN pecl install xdebug-2.6.1 \
    && docker-php-ext-enable xdebug
COPY php.ini /usr/local/etc/php/php.ini
