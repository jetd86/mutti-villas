#!/bin/bash

# Остановка и удаление контейнеров
echo "Stopping and removing containers..."
docker ps -a --filter "name=bitrix_php8.4" -q | xargs -r docker stop
docker ps -a --filter "name=bitrix_php8.4" -q | xargs -r docker rm -f

docker ps -a --filter "name=bitrix_apache2" -q | xargs -r docker stop
docker ps -a --filter "name=bitrix_apache2" -q | xargs -r docker rm -f

docker ps -a --filter "name=bitrix_nginx" -q | xargs -r docker stop
docker ps -a --filter "name=bitrix_nginx" -q | xargs -r docker rm -

docker ps -a --filter "name=bitrix_mysql" -q | xargs -r docker stop
docker ps -a --filter "name=bitrix_mysql" -q | xargs -r docker rm -f

docker ps -a --filter "name=bitrix_redis" -q | xargs -r docker stop
docker ps -a --filter "name=bitrix_redis" -q | xargs -r docker rm -f

# Пересоздание сети
echo "Recreating network..."
docker network rm docker-network 2>/dev/null || true
docker network create docker-network

# Запуск контейнеров
echo "Starting containers..."
docker compose down
docker compose build --no-cache
docker compose up -d

#чтобы прошла проверка битрикса на права, так как пользователь www-data используется
chown -R www-data:www-data ./app

# Ждем немного, чтобы контейнеры запустились
sleep 5



# Проверяем контейнеры
echo "Checking containers..."
docker ps -a
