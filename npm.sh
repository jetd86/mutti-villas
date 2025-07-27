#!/bin/bash

# Создать папки если они не существуют
chmod 777 -R ./app/local/assets/*

echo "сборка фронта"
# Добавить переменные окружения для лучшего вывода в Docker
docker exec --user www-data -e FORCE_COLOR=1 -e CI=false bitrix_node24 npm run build -- --logLevel info

echo "генерация картинок в папке  generated"
docker exec -u root bitrix_php8.4.8-fpm php /var/www/html/local/tools/sync_images.php


ls -ls ./app/local/assets/assets/images/ | grep generated
