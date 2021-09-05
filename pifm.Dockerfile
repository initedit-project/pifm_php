FROM gcc:9.4 as base
RUN apt update -y && \
    apt-get install libsndfile1-dev -y
WORKDIR /src
COPY ./src .
RUN make clean && make

FROM php:7.2-apache
RUN apt update -y && \
    apt install sudo screen libsndfile1-dev -y
RUN echo "www-data ALL=(ALL:ALL) NOPASSWD:ALL" >> /etc/sudoers
RUN a2enmod rewrite
COPY ./ /var/www/html/
COPY --from=base /src/pi_fm_rds /var/www/html/pi_fm_rds
RUN chown www-data:www-data -R /var/www/html/
RUN chmod 700 /var/www/html/uploads
