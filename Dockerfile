FROM php:8.1-fpm

RUN apt-get update -yqq && \
    apt-get install -yqq \
    git \
    curl \
    zip \
    unzip \
    gzip \
    libzip-dev \
    libicu-dev \
    nano

RUN docker-php-ext-configure intl

RUN docker-php-ext-install intl pdo zip opcache bcmath

RUN pecl install xdebug && docker-php-ext-enable xdebug opcache

RUN echo "opcache.max_accelerated_files = 20000" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
