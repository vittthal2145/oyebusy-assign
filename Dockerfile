# Use official PHP with Apache
FROM php:8.1-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy app
COPY index.php /var/www/html/

# Set proper permissions (if needed)
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]
