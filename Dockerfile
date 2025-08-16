FROM richarvey/nginx-php-fpm:3.1.6

# Копирование файлов
COPY . /var/www/html/

# Установка зависимостей без SSL
RUN composer config disable-tls true && \
    composer config secure-http false && \
    composer install --no-dev --optimize-autoloader

# Запуск миграций базы данных
RUN php artisan migrate --force

# Права доступа
RUN chown -Rf nginx:nginx /var/www/html/

EXPOSE 80
