FROM php:8.2-fpm-alpine
RUN docker-php-ext-install pdo pdo_mysql

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
