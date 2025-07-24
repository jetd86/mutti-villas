FROM php:8.4.8-fpm

USER root

# Установка системных зависимостей
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    zip \
    unzip \
    git \
    imagemagick \
    libmagickwand-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    # Добавляем зависимости для компиляции
    build-essential \
    pkg-config \
    && rm -rf /var/lib/apt/lists/*

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Сборка imagick из исходников (совместимо с PHP 8.4)
RUN git clone https://github.com/Imagick/imagick.git --depth 1 /tmp/imagick \
    && cd /tmp/imagick \
    && phpize \
    && ./configure \
    && make \
    && make install \
    && rm -rf /tmp/imagick

# Включение расширений
RUN docker-php-ext-enable imagick

# Устанавливаем Redis расширение для PHP
RUN git clone --depth 1 https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis \
    && docker-php-ext-install redis \
    && docker-php-ext-enable redis

# Настройка и установка PHP расширений
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_mysql \
        gd \
        mysqli \
        zip \
        intl \
        mbstring \
        opcache

# Копирование конфигурации PHP
COPY php.ini /usr/local/etc/php/php.ini

# Установка рабочей директории
WORKDIR /var/www/html

# Копирование файлов приложения
COPY . /var/www/html/



# Установка прав доступа ПОСЛЕ копирования файлов
RUN find /var/www/html -type f -exec chmod 644 {} \; \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && chown -R www-data:www-data /var/www/html


# В php.ini добавьте
RUN echo "variables_order = EGPCS" >> /usr/local/etc/php/php.ini
RUN echo "request_order = GP" >> /usr/local/etc/php/php.ini



# Переключение на пользователя www-data
USER www-data

EXPOSE 9000

CMD ["php-fpm"]
