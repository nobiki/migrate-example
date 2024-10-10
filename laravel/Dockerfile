FROM bitnami/laravel:11
WORKDIR /opt/bitnami/laravel

## Install tenancy package
RUN composer require stancl/tenancy

## Add Settings
ADD files/ /tmp/files/

# Delete Laravel Default Migration Files
RUN rm /opt/bitnami/laravel/database/migrations/*.php

# Tenancy Insialize
RUN php artisan tenancy:install

# Tenancy Migration
RUN apt update && apt install -y rsync \
 &&  apt clean &&  apt autoclean \
 &&  rm -rf /var/lib/apt/lists/* \
 && rsync -avz /tmp/files/ /opt/bitnami/laravel/

