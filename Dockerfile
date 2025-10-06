FROM php:8.2-apache

WORKDIR /var/www/html
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev libpq-dev zip unzip
RUN docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html/

RUN cd /var/www/html && composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

RUN a2enmod rewrite

RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN echo "<Directory /var/www/html/public>" > /etc/apache2/conf-available/laravel.conf
RUN echo "    AllowOverride All" >> /etc/apache2/conf-available/laravel.conf
RUN echo "    Require all granted" >> /etc/apache2/conf-available/laravel.conf
RUN echo "</Directory>" >> /etc/apache2/conf-available/laravel.conf
RUN a2enconf laravel

EXPOSE 80
CMD ["apache2-foreground"]