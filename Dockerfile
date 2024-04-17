FROM php:8.2-fpm

RUN apt-get update && apt-get upgrade -y \
    && apt-get install -y \
        git \
        curl \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        libfreetype-dev \
        libjpeg62-turbo-dev \
        libmemcached-dev \
        libssl-dev \
        zlib1g-dev \
        libpq-dev \
        unzip \
        libzip-dev \
        mariadb-client \
        build-essential \
        autoconf \
        gdb \
        iputils-ping \
        libaio1 \
        libaio-dev

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl dom zip
#RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && docker-php-ext-install pdo_pgsql pgsql

RUN docker-php-ext-configure intl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./application /var/www
COPY ./application/.env.example .env

WORKDIR /var/www

RUN composer install --optimize-autoloader --no-dev

RUN php artisan optimize
RUN php artisan key:generate
#RUN php artisan migrate
RUN php artisan storage:link

RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

USER www-data

EXPOSE 9000

CMD ["php-fpm"]
