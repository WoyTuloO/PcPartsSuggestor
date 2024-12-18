FROM php:7.4.3-fpm-alpine3.11

# Zainstaluj wymagane pakiety do instalacji rozszerzeń PostgreSQL
RUN apk add --no-cache --virtual .build-deps gcc libpng-dev libjpeg-turbo-dev freetype-dev \
    && apk add --no-cache postgresql-dev \
    && docker-php-ext-install pdo_pgsql pgsql \
    && apk del .build-deps

# Skopiuj pliki aplikacji do kontenera
COPY . /app
COPY docker/php/php.ini /usr/local/etc/php/php.ini


# Ustaw folder aplikacji jako wolumen
VOLUME [ "/app" ]

# Expose port 9000
EXPOSE 9000

# Ustaw komendę do uruchomienia PHP-FPM
CMD ["php-fpm"]
