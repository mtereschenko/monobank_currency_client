FROM composer:lts AS composer

FROM php:7.1-fpm-alpine3.9 as base_image
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev && \
  docker-php-ext-install pdo pdo_pgsql

WORKDIR /app

FROM base_image as development
COPY ./containers/php/runners/entrypoint.development.sh /entrypoint.development.sh
RUN chmod +x /entrypoint.development.sh
CMD ["php-fpm"]
ENTRYPOINT ["/entrypoint.development.sh"]


