#!/bin/bash

echo "сборка фронта"
docker exec --user www-data bitrix_node22 npm run build

chown -R www-data:www-data ./app/local/assets/*

echo "генерация картинок в папке  generated"
docker exec bitrix_php8.4.8-fpm php /var/www/html/local/tools/sync_images.php

ls -ls ./app/local/assets/assets/images/ | grep generated
