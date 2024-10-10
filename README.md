#### Tenancy for laravel

Try out -> [Tenancy for Laravel](https://tenancyforlaravel.com/)

## Setup

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

## Tenant Operations

Create a tenant `foo`

```
# docker compose run --rm artisan  app:tenancy create-tenant foo
# docker compose run --rm artisan  app:tenancy create-tenant bar
```

Delete a tenant `foo`

```
# docker compose run --rm artisan  app:tenancy delete-tenant foo
# docker compose run --rm artisan  app:tenancy delete-tenant bar
````

## Tenant Migration

All Tenant Migration

```
# docker compose run --rm artisan  tenants:migrate
Tenant: foo

   INFO  Running migrations.

  2024_10_09_1516_create_test_mysql_table1 ............................................................................................ 31.70ms DONE
  2024_10_09_1516_create_test_mysql_table2 ............................................................................................ 26.44ms DONE
  2024_10_09_1516_create_test_mysql_table3 ............................................................................................ 24.14ms DONE

Tenant: bar

   INFO  Running migrations.

  2024_10_09_1516_create_test_mysql_table1 ............................................................................................ 28.30ms DONE
  2024_10_09_1516_create_test_mysql_table2 ............................................................................................ 27.24ms DONE
  2024_10_09_1516_create_test_mysql_table3 ............................................................................................ 21.56ms DONE
```

Single Tenant Migration

```
# docker compose run --rm artisan  tenants:migrate --tenants=foo
Tenant: foo

   INFO  Nothing to migrate.

# docker compose run --rm artisan  tenants:migrate --tenants=foo --tenants=bar
Tenant: foo

   INFO  Nothing to migrate.
```

Rollback

```
# docker compose run --rm artisan tenants:rollback

Tenant: foo

   INFO  Rolling back migrations.

  2024_10_09_1516_create_test_mysql_table3 ............................................................................................ 19.80ms DONE
  2024_10_09_1516_create_test_mysql_table2 ............................................................................................ 17.06ms DONE

Tenant: bar

   INFO  Rolling back migrations.

  2024_10_09_1516_create_test_mysql_table3 ............................................................................................ 19.26ms DONE
  2024_10_09_1516_create_test_mysql_table2 ............................................................................................ 17.54ms DONE
```


