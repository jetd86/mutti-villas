#!/bin/bash

# Параметры
CONTAINER="bitrix_mysql8.4"
DATABASE="bitrix_docker_db"
USER="root"
PASSWORD="aFf2421246TGaU#3sdf55512348"
BACKUP_NAME="bitrix_docker_db_backup.sql"

# Путь к корню проекта (текущая директория)
PROJECT_ROOT="$(pwd)"

docker exec "$CONTAINER" /usr/bin/mysqldump -u"$USER" --password="$PASSWORD" "$DATABASE" > "$PROJECT_ROOT/$BACKUP_NAME"

echo "Дамп базы $DATABASE скопирован в $PROJECT_ROOT/$BACKUP_NAME"
