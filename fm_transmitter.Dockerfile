FROM ubuntu:20.04 as base
RUN apt update -y && \
    apt-get install make build-essential git libraspberrypi-dev -y
WORKDIR /src
RUN git clone https://github.com/markondej/fm_transmitter.git
WORKDIR /src/fm_transmitter
RUN make GPIO21=1

FROM ubuntu/apache2:latest
RUN apt update -y && \
    apt install php sudo screen libraspberrypi-dev -y
RUN rm -rf /var/www/html/index.html
COPY ./ /var/www/html/
COPY --from=base /src/fm_transmitter/fm_transmitter /var/www/html/fm_transmitter
COPY --from=base /src/fm_transmitter/acoustic_guitar_duet.wav /var/www/html/uploads/-acoustic_guitar_duet.wav
RUN sed -i 's/pi_fm_rds/fm_transmitter/g' /var/www/html/config.php && \
    sed -i 's/-freq/-f/g' /var/www/html/radio.php && \
    sed -i 's/-audio//g' /var/www/html/radio.php
RUN echo "www-data ALL=(ALL:ALL) NOPASSWD:ALL" >> /etc/sudoers
RUN a2enmod rewrite
RUN chown www-data:www-data -R /var/www/html/
RUN chmod 700 /var/www/html/uploads
