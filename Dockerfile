# 1. Use PHP 8.2 with Apache
FROM php:8.2-apache

# 2. Install tools for Laravel (Zip, MySQL, etc.)
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip pdo_mysql

# 3. Enable Apache "mod_rewrite" (Fixes Laravel 404 errors)
RUN a2enmod rewrite

# 4. Set the document root to 'public' (Laravel standard)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# 5. Copy your application code
COPY . /var/www/html

# 6. Install Composer (PHP Dependency Manager)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 7. Fix permissions (So Laravel can save files)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache