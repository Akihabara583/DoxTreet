FROM richarvey/nginx-php-fpm:3.1.6

# Копирование файлов
COPY . /var/www/html/

# Установка зависимостей.
# В Railway переменные окружения автоматически обрабатывают SSL,
# поэтому команды `composer config` не нужны и могут вызывать проблемы.
RUN composer install --no-dev --optimize-autoloader

# Запуск миграций базы данных.
# Эта команда должна выполняться после установки зависимостей,
# чтобы все необходимые классы и файлы были доступны.
RUN php artisan migrate --force

# Установка прав доступа.
# Это важно для того, чтобы Nginx мог читать и записывать файлы.
RUN chown -Rf nginx:nginx /var/www/html/

# Открытие порта.
EXPOSE 80
