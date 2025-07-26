#!/bin/bash
# Подгружаем переменные из .env
if [ -f .env ]; then
    source .env
    echo "Loaded variables from .env"
else
    echo "Error: .env file not found!"
    exit 1
fi

# Остановка и удаление контейнеров
echo "Stopping and removing containers..."
docker ps -a --filter "name=${PROJECT_NAME}_php8.4" -q | xargs -r docker stop
docker ps -a --filter "name=${PROJECT_NAME}_php8.4" -q | xargs -r docker rm -f

docker ps -a --filter "name=${PROJECT_NAME}_apache2" -q | xargs -r docker stop
docker ps -a --filter "name=${PROJECT_NAME}_apache2" -q | xargs -r docker rm -f

docker ps -a --filter "name=${PROJECT_NAME}_nginx" -q | xargs -r docker stop
docker ps -a --filter "name=${PROJECT_NAME}_nginx" -q | xargs -r docker rm -

docker ps -a --filter "name=${PROJECT_NAME}_mysql" -q | xargs -r docker stop
docker ps -a --filter "name=${PROJECT_NAME}_mysql" -q | xargs -r docker rm -f

docker ps -a --filter "name=${PROJECT_NAME}_redis" -q | xargs -r docker stop
docker ps -a --filter "name=${PROJECT_NAME}_redis" -q | xargs -r docker rm -f

docker ps -a --filter "name=${PROJECT_NAME}_node" -q | xargs -r docker stop
docker ps -a --filter "name=${PROJECT_NAME}_node" -q | xargs -r docker rm -f

# Пересоздание сети
echo "Recreating network..."
docker network rm docker-network 2>/dev/null || true
docker network create docker-network

## Запуск контейнеров
echo "Starting containers..."
docker compose down
docker compose build --no-cache
docker compose up -d

#чтобы прошла проверка битрикса на права, так как пользователь www-data используется
#sudo chown -R www-data:www-data ./app
#find ./app -type d -exec chmod 755 {} \;
#find ./app -type f -exec chmod 644 {} \;

#если нет vendor, обновляем composer
#[ -d ./app/vendor ] || composer update -d ./app/


# Ждем немного, чтобы контейнеры запустились
sleep 5

# Проверяем контейнеры
echo "Checking containers..."
docker ps -a
