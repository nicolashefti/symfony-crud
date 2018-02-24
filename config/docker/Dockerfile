FROM php:7.2-apache

# PHP Extensions
RUN apt-get update \
    && apt-get -y install libtidy-dev \
    && docker-php-ext-install tidy \

    && apt-get install -y zlib1g-dev \
    && docker-php-ext-install zip

# Additional packages
RUN apt-get -y install \
    git \
    vim \
    curl

# Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/bin/composer

WORKDIR /var/www/html

# Enable Apache modules
RUN a2enmod rewrite

# Allow the application to write files
RUN usermod -u 1000 www-data
RUN usermod -G staff www-data
