#!/bin/bash

if [ ! -e $HOME/bootstrap.lock ]; then
  php artisan tenancy:install
  rsync -avz /tmp/files/ /opt/bitnami/laravel/

  touch $HOME/bootstrap.lock
fi

# Laravel Default Migration
php artisan migrate

# Tenancy Migration
php artisan app:tenancy
php artisan tenants:migrate

tail -f /dev/null
