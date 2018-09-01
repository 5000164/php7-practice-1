FROM php:7.2.9-cli

WORKDIR /opt/project

RUN apt-get update \
&& apt-get -y upgrade \
&& apt-get install -y \
    git \
    zip \
    unzip \
&& pecl install xdebug-2.6.1 \
&& docker-php-ext-enable xdebug
COPY php.ini /usr/local/etc/php/php.ini

CMD ["php", "-S", "0.0.0.0:80"]
