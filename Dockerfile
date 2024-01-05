# Set master image
FROM php:8.0-fpm

# Set working directory
WORKDIR /app
COPY . .

# Expose port 9000 and start php-fpm server. is used to inform Docker that the container will listen on a specific network port at runtime. By default, the ports exposed using the EXPOSE instruction are internal to the Docker container network and can only be accessed by other containers within the same Docker network.
EXPOSE 9000
CMD ["php-fpm"]
