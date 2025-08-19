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

docker ps -a --filter "name=bitrix_node" -q | xargs -r docker stop
docker ps -a --filter "name=bitrix_node" -q | xargs -r docker rm -f