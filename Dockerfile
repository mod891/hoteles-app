FROM php:8.2
RUN apt-get update -y && apt-get install -y openssl zip unzip git nano
#  php-mbstring php-mysql 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# RUN docker-php-ext-install pdo mbstring ?

WORKDIR /var/www

RUN git clone https://github.com/mod891/hoteles-app.git .

RUN composer install

RUN mysql < database/init.sql

# RUN php artisan key:generate

EXPOSE 6565

CMD php artisan migrate

CMD php artisan db:seed

CMD php artisan serve --host=0.0.0.0 --port=6565


# To delete all the images → docker rmi -f $(docker images -aq)
# CMD php artisan serve --host=0.0.0.0 --port=6565
#php artisan serve --host=0.0.0.0 --port=6565
# docker build -t test-docker-1 . --progress=plain --no-cache
# docker build -t test-docker-1 .
# docker images
# docker stop
# docker run -p 6565:6565 test-docker-1
# docker ps → Listing the running containers
# docker rmi → removes images by their ID
# docker rmi -f → force removes images by their ID
# docker stop $(docker ps -a -q)
