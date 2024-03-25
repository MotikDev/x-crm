FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    curl \
    libonig-dev \
    libzip-dev \
    libxml2-dev \
    libpng-dev \
    unzip \
    zip

RUN docker-php-ext-install zip pdo_mysql mysqli mbstring exif pcntl bcmath gd

RUN apt-get update && \
    apt-get install -y nginx

WORKDIR /app

COPY ./ /app/

RUN rm /etc/nginx/sites-available/default

COPY ./nginx/default.conf /etc/nginx/sites-available/default

RUN chown -R www-data:www-data /app/bootstrap/cache /app/storage/framework /app/storage/logs /app/public

RUN chmod -R 775 /app/bootstrap/cache /app/storage/framework /app/storage/logs /app/public

EXPOSE 80 9000

CMD ["sh", "-c", "php-fpm -F & nginx -g 'daemon off;'"]
