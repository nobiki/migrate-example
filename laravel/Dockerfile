FROM bitnami/laravel:11.2.1
WORKDIR /opt/bitnami/laravel

## Install tenancy package
RUN composer require stancl/tenancy:"v3.8.5"

## Add Settings
ADD files/ /tmp/files/
RUN apt update && apt install -y rsync \
 &&  apt clean &&  apt autoclean \
 &&  rm -rf /var/lib/apt/lists/*

## entrypoint
COPY entrypoint.sh /entrypoint.sh
