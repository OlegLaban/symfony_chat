FROM php:8.2-fpm

# system deps
RUN apt-get update && apt-get install -y \
    git zip unzip libpq-dev libonig-dev libzip-dev \
  && docker-php-ext-install pdo pdo_pgsql opcache mbstring zip

# composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /srv/app

# copy and install (dev: skip heavy install in image, use bind-mounted vendor in dev)
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction || true

# user
RUN useradd -G www-data,root -u 1000 -d /home/symfony symfony
USER symfony

EXPOSE 9000
CMD ["php-fpm"]
