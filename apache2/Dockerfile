FROM ubuntu/apache2:latest

RUN apt-get update && apt-get install -y \
    vim \
    && rm -rf /var/lib/apt/lists/*

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN a2enmod rewrite \
    && a2enmod headers \
    && a2enmod proxy \
    && a2enmod proxy_fcgi

RUN a2dissite 000-default

COPY ./bitrix.conf /etc/apache2/sites-available/bitrix.conf

RUN a2ensite bitrix

RUN chown -R www-data:www-data /var/www/html && \
    find /var/www/html -type d -exec chmod 755 {} \; && \
    find /var/www/html -type f -exec chmod 644 {} \;

EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]
