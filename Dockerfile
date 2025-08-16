FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html/

# Установка зависимостей без SSL
RUN composer config disable-tls true && \
    composer config secure-http false && \
    composer install --no-dev --optimize-autoloader

# Права доступа
RUN chown -Rf nginx:nginx /var/www/html/

EXPOSE 80
