# https://github.com/codefresh-contrib/php-composer-sample-app/blob/master/Readme.md

## stage vendor
FROM composer:2 as vendor

# create tmp dir and copy composer files
WORKDIR /tmp/
COPY htdocs/composer.json composer.json
COPY htdocs/composer.lock composer.lock

# execute composer dependencies installation
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

## stage apache
FROM php:8.2-apache

# change document root
ENV APACHE_DOCUMENT_ROOT /var/www/html/pub/
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# copy project files
COPY ./htdocs /var/www/html
COPY --from=vendor /tmp/vendor/ /var/www/html/vendor/
