FROM php:8.1.17-apache

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql

RUN pecl install xdebug-stable \
    && docker-php-ext-enable xdebug

RUN apt-get install -y libmemcached-dev zlib1g-dev \
    && pecl install memcached \
    && docker-php-ext-enable memcached

RUN apt-get install zip unzip \
    && curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && unlink composer-setup.php

RUN apt-get install libzip-dev -y \
    && docker-php-ext-install zip   


RUN echo 'date.timezone="America/Sao_Paulo"' >> /usr/local/etc/php/conf.d/date.ini \
    && echo 'opcache.enable=1' >> /usr/local/etc/php/conf.d/opcache.conf \
    && echo 'opcache.validate_timestamps=1' >> /usr/local/etc/php/conf.d/opcache.conf \
    && echo 'opcache.fast_shutdown=1' >> /usr/local/etc/php/conf.d/opcache
    
# Enable Apache2 modules
RUN a2enmod rewrite

# nodejs install
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

#RUN chown -R www-data:www-data *
#RUN chmod -R 777 /var/www/html/storage