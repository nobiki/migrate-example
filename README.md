#### Tenancy for laravel

Try out -> [Tenancy for Laravel](https://tenancyforlaravel.com/)

#### setup

```
# Start MySQL
docker compose up --force-recreate -d db

# Build Laravel
docker compose build artisan
```

Create tables `tenants` and `domains`

```
# docker compose run --rm artisan php artisan migrate

   INFO  Preparing database.

  Creating migration table ............................................................................................................ 31.82ms DONE

   INFO  Running migrations.

  2019_09_15_000010_create_tenants_table .............................................................................................. 32.63ms DONE
  2019_09_15_000020_create_domains_table ............................................................................................. 148.05ms DONE
```

#### usage

Create a tenant `foo`

```
# docker compose run --rm artisan php artisan app:tenancy create-tenant foo
```

Delete a tenant `foo`

```
# docker compose run --rm artisan php artisan app:tenancy delete-tenant foo
````
