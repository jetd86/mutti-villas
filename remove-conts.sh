#!/bin/bash
# Остановка и удаление контейнеров
echo "Stopping and removing containers..."
docker ps -a --filter "name=bitrix-test_php8.4" -q | xargs -r docker stop
docker ps -a --filter "name=bitrix-test_php8.4" -q | xargs -r docker rm -f

docker ps -a --filter "name=bitrix-test_apache2" -q | xargs -r docker stop
docker ps -a --filter "name=bitrix-test_apache2" -q | xargs -r docker rm -f

docker ps -a --filter "name=bitrix-test_nginx" -q | xargs -r docker stop
docker ps -a --filter "name=bitrix-test_nginx" -q | xargs -r docker rm -

docker ps -a --filter "name=bitrix-test_mysql" -q | xargs -r docker stop
docker ps -a --filter "name=bitrix-test_mysql" -q | xargs -r docker rm -f

docker ps -a --filter "name=bitrix-test_redis" -q | xargs -r docker stop
docker ps -a --filter "name=bitrix-test_redis" -q | xargs -r docker rm -f

docker ps -a --filter "name=bitrix-test_node" -q | xargs -r docker stop
docker ps -a --filter "name=bitrix-test_node" -q | xargs -r docker rm -f