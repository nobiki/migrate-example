#!/bin/bash

if [ ! -e $HOME/bootstrap.lock ]; then
  # Delete Laravel Default Migration Files
  rm /opt/bitnami/laravel/database/migrations/*.php

  # Tenancy Insialize
  php artisan tenancy:install
  php artisan migrate

  # Tenancy Migration
  rsync -avz /tmp/files/ /opt/bitnami/laravel/

  touch $HOME/bootstrap.lock
fi

# debug
php artisan app:tenancy
php artisan tenants:migrate

php artisan serve --host=0.0.0.0
