# Use an official PHP image with Apache
FROM php:8.2-apache

# Copy your application code into the web server's document root
COPY . /var/www/html

# Expose port 80 (standard HTTP port)
EXPOSE 80
