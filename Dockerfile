FROM php:7.4-apache
COPY . /var/www/html/
RUN apt-get -y update \
&& apt-get install -y libicu-dev \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl
RUN docker-php-ext-install pdo pdo_mysql mysqli
COPY ./php.ini $PHP_INI_DIR/php.ini
RUN chmod -R 777 /var/www/
RUN a2enmod rewrite
EXPOSE 80