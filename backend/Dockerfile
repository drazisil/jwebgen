FROM php:7.2-apache

RUN a2enmod rewrite
RUN a2enmod headers
RUN /etc/init.d/apache2 restart

COPY src/ /var/www/html/
