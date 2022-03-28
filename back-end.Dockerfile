FROM php:7-apache

# Initial Installation of Container Dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip

# Installing php extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg\
    && docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install pdo_mysql mbstring

# Installing Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enabling the Apache Rewrite Module
RUN a2enmod rewrite
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Copying application to apache
COPY ./ /var/www/html

# Installing Composer
RUN composer install

# Changes the user to own the folder and files recursively
RUN chown -R www-data storage/

# Permission to avoid LOG writing error (Access Permission) and bootstrap
RUN chmod -R 777 /var/www/html/storage/

# Exposing internal server port
EXPOSE 80
