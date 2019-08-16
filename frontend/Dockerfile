FROM php:7.2-apache

RUN a2enmod rewrite
RUN a2enmod headers
RUN /etc/init.d/apache2 restart

COPY smarty /var/www/smarty/
COPY src/ /var/www/html/
RUN chown -R www-data:www-data /var/www/smarty/
RUN chmod 755 /var/www/smarty/
RUN chown -R www-data:www-data /var/www/html/smarty/templates_c
RUN chmod 755 /var/www/html/smarty/templates_c
