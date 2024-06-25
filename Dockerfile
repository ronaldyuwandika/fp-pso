FROM composer:latest as build
WORKDIR /app
COPY . /app
RUN composer install --no-scripts --no-autoloader && \
    composer dump-autoload --optimize

FROM php:8.2-apache

RUN apt-get update -y && \
    apt-get install -y --no-install-recommends 

RUN docker-php-ext-install pdo pdo_mysql mysqli

EXPOSE 8080
COPY --from=build /app /var/www/
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN  chown -R www-data:www-data /var/www/;
RUN  find /var/www/ -type f -exec chmod 644 {} \;
RUN  find /var/www/ -type d -exec chmod 755 {} \;

RUN cd /var/www/ && \
    apt-get update && apt-get install -y npm && \
    npm install && \
    npm run build

RUN cd /var/www/ && \
    mv .env.example .env && \
    php artisan key:generate && \
    chgrp -R www-data storage bootstrap/cache && \
    chmod -R ug+rwx storage bootstrap/cache && \
    echo "Listen 8080" >> /etc/apache2/ports.conf && \
    a2enmod rewrite && \
    service apache2 restart
    