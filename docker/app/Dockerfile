FROM php:7.2.9-apache

RUN pecl install xdebug-2.6.1 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install mysqli

ENV APACHE_DOCUMENT_ROOT /opt/project/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY php.ini /usr/local/etc/php/php.ini
