#!/bin/ash

# Instructions to follow in the dev container
composer install --optimize-autoloader

if [ ! -f /app/.env ]
then
    cp /app/.env.example /app/.env
fi

php /app/artisan key:generate
php /app/artisan optimize:clear

# This thing should run with supervisord
php artisan websockets:serve &>/dev/null &

# This thing is just for development needs and should be replaced  with the internal cron of the image or you can use the host cron. Depends on your needs.
ash scheduler &

exec "$@"
