# Set master image
FROM php:8.0-fpm

# Set working directory
WORKDIR /var/www/html
COPY . .


