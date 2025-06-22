FROM mcr.microsoft.com/devcontainers/php:8.2

RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    git \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer