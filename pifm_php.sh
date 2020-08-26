function pifm_php_php() {

    #Install require packages
    apt-get install php
    apt-get install apache2
    apt-get install screen
    systemctl enable apache2
    systemctl start apache2

    #Download pifm_php from github and compile
    mkdir -p /var/www/html/pifm_php
    cd /var/www/html/pifm_php
    git clone https://github.com/ChristopheJacquet/PiFmRds.git
    cd PiFmRds/src
    make clean
    make
    cp pi_fm_rds /var/www/html/pifm_php

    #Download pifm_php from github
    cd /var/www/html/pifm_php
    git clone https://github.com/initedit-project/pifm_php.git
    cp -pr pifm_php/* .
    chmod -R +x *
    chown -R www-data:www-data .

    #Give user www-data sudo access
    if [[ $(cat /etc/sudoers | grep 'www-data') == "" ]]
    then
    echo "www-data ALL=(ALL:ALL) NOPASSWD:ALL" >> /etc/sudoers
    fi

    #URL for pifm_php_php
    ip_add=$(ifconfig | grep -E "([0-9]{1,3}\.){3}[0-9]{1,3}" | grep -v 127.0.0.1 | awk '{ print $2 }' | cut -d "/" -f 1)
    echo "Browse to http://$ip_add/pifm_php"

}

pifm_php_php
