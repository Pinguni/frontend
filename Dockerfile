FROM php:7.4-fpm

RUN apt-get update -y && apt-get install -y \
    openssl \
    zip \
    unzip \ 
    git \
    npm \
    curl \
    libonig-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sL https://deb.nodesource.com/setup_13.x  | bash -
RUN apt-get -y install nodejs

# Prevent caching
ARG CACHE=$ARG_CACHE

# Clone new folder
RUN git clone https://github.com/Pinguni/frontend.git

# Set working directory to pinguni
WORKDIR frontend

# Install dependencies
RUN composer install
RUN npm install
RUN npm run prod

# Laravel cache
CMD php artisan optimize

# Serve app
CMD php artisan serve --host=0.0.0.0 --port=80
EXPOSE 80