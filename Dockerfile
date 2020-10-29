FROM php:7.2-fpm

# Install PHP Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y libmcrypt-dev zip

# Install Extension 
RUN docker-php-ext-install  mbstring mysqli pdo pdo_mysql