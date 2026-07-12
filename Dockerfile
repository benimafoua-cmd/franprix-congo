FROM php:8.2-apache
RUN docker-php-ext-install pdo pdo_mysql

-- Configuration du port 10000 obligatoire pour l'offre gratuite Render
RUN sed -i 's/80/10000/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

COPY . /var/www/html/
EXPOSE 10000
