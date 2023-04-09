#!/usr/bin/env bash
  composer install

  echo "thu muc..."
   pwd
  echo "App clear..."
  chmod -R 777 storage \
  && php artisan key:generate \
  && php artisan migrate --force \
  && php artisan optimize:clear \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan event:cache \
    && php artisan view:cache

cd /var/www/website-new
echo " Docker stop old image .."
docker stop website-new-app || true && docker rm -fv website-new-app || true

echo "Docker running app ..."

docker run -d -ti -e CONTAINER_ROLE=app -e DB_CONNECTION="mysql" -e DB_HOST="mysql" -e DB_PORT="3306" -e DB_DATABASE="website_news" -e DB_USERNAME="root" -e DB_PASSWORD="password" -e  -p 5082:8000 --name=website-new-app --restart=unless-stopped website-new-app

docker logs -f website-new-app

echo "Done"
  echo "App is running..."
  php artisan serve --host=0.0.0.0
