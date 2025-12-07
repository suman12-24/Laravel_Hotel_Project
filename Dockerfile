# Use official PHP image with extensions
FROM php:8.2-fpm

# Install needed dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy all project files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Laravel required permissions
RUN chmod -R 775 storage bootstrap/cache

# Copy Nginx config
COPY ./nginx.conf /etc/nginx/conf.d/default.conf

# Expose port
EXPOSE 80

# Start Nginx and PHP-FPM
CMD service nginx start && php-fpm
