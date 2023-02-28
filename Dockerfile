FROM php:8.1-cli AS php-base

ENV APP_ROOT /application
ENV APP_TIMEZONE UTC

WORKDIR ${APP_ROOT}

#Set TimeZone
ENV TZ=${APP_TIMEZONE}
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN sed -i "s|max_execution_time = 30|max_execution_time = 300|g" "$PHP_INI_DIR/php.ini"
RUN sed -i "s|memory_limit = 128M|memory_limit = 2G|g" "$PHP_INI_DIR/php.ini"
RUN sed -i "s|post_max_size = 8M|post_max_size = 512M|g" "$PHP_INI_DIR/php.ini"
RUN sed -i "s|max_upload_filesize = 2M|max_upload_filesize = 512M|g" "$PHP_INI_DIR/php.ini"
RUN sed -i "s|upload_max_filesize = 2M|upload_max_filesize = 512M|g" "$PHP_INI_DIR/php.ini"
RUN echo "opcache.optimization_level=0" >> "$PHP_INI_DIR/php.ini"

# Add Production Dependencies
RUN apt-get update -y
RUN apt-get install -y \
    bash \
    libpq-dev \
    zlib1g-dev \
    libpng-dev \
    libxml2-dev \
    libpng-dev \
    libzip-dev \
    libbz2-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    libgd-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    libavif-dev \
    libxpm-dev \
    libonig-dev \
    libmcrypt-dev \
    jpegoptim optipng pngquant gifsicle

# Configure & Install Extension
RUN docker-php-ext-configure \
    opcache --enable-opcache

# Install Mongodb
RUN pecl install mongodb redis \
    && docker-php-ext-enable mongodb redis.so

RUN docker-php-ext-install \
    opcache \
    pdo_pgsql \
    pgsql \
    mysqli \
    pdo_mysql \
    pdo \
    gd \
    xml \
    intl \
    sockets \
    bz2 \
    pcntl \
    bcmath \
    exif \
    zip \
    soap

#FROM node:16 as npm-build
#
#WORKDIR /app
#
#RUN mkdir -p /app/public
#COPY package.json vite.config.js package-lock.json /app/
#COPY resources/ /app/resources/
#RUN npm install && npm run build

FROM composer:latest as vendor

WORKDIR /app

COPY composer.json composer.lock /app/
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist \
    --optimize-autoloader \
    --no-dev

FROM php-base AS php-build


COPY dockerize/start.sh /usr/local/bin/start
RUN chmod u+x /usr/local/bin/start

COPY . .
COPY --from=vendor /app/vendor ${APP_ROOT}/vendor
#COPY --from=npm-build /app/public ${APP_ROOT}/public
#COPY --from=npm-build /app/mix-manifest.json ${APP_ROOT}/mix-manifest.json

#RUN cp .env.example .env
RUN php artisan key:generate --ansi
RUN chmod -R 777 public/
RUN pwd && ls -la

EXPOSE 8000
CMD ["/usr/local/bin/start"]
