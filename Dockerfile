FROM php:7.1-cli

RUN apt-get update \
&& apt-get -y upgrade \
&& apt-get install -y \
    git \
    zip \
    unzip \
&& pecl install xdebug-2.5.5 \
&& docker-php-ext-enable xdebug

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
&& php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
&& php composer-setup.php --install-dir=/usr/local/bin --filename=composer --version=1.6.2 \
&& php -r "unlink('composer-setup.php');"

COPY php.ini /usr/local/etc/php/php.ini

CMD tail -f /dev/null
