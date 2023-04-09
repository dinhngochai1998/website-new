#!/usr/bin/env bash
# coppy env
RUN cp .env.example .env

  echo "App clear..."
  chmod -R 777 storage \
  && php artisan migrate --force \
  && php artisan optimize:clear \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan event:cache \
    && php artisan view:cache


  echo "App is running..."
  php artisan serve --host=0.0.0.0
