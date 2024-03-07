FROM php:8.2-fpm-alpine as app

# Useful php extension installer image, copy binary into your container
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

# RUN docker-php-ext-install pdo pdo_mysql
# install php extensions
# exit on erros, exit on unset variable, print every command as it is executed
RUN set -eux; \
    install-php-extensions pdo pdo_mysql;

# allow super user - set this if use Compsoer as a super user at all times like in docker containers
ENV COMPOSER_ALLOW_SUPERUSER=1

#obtain compsoer using multi-stage build
COPY --from=composer /usr/bin/composer /usr/bin/composer

# here we are copying only composer.json and composer.lock
COPY ./app/composer.* ./

# install
RUN composer install --prefer-dist --no-dev --no-scripts --no-progress --no-interaction

# copy application files to the working directory
COPY ./app .

# run composer
RUN composer dump-autoload --optimize

# Dev image
# This stage is meant to be target-built into a separate image
FROM app as app_dev

# xdebug has different modes / functionalities. we can default to 'off' and set to 'debug'
# when we run docker compose up if we need it
ENV XDEBUG_MODE=off

# COPY ./php/conf.d/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY ./php/conf.d/xdebug.ini $PHP_INI_DIR/conf.d/xdebug.ini

# install xdebug
RUN set -eux; \
    install-php-extensions xdebug
