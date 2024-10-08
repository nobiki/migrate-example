#### migration tool

[golang-migrate/migrate: Database migrations. CLI and Golang library.](https://github.com/golang-migrate/migrate?tab=readme-ov-file)

#### usage

```
# Start MySQL
docker compose up -d db
```

```
# Migration: up
docker compose run migrate up
0/u initial (36.39937ms)
20241008/u example (47.790447ms)
20241009/u example2 (60.384725ms)
```


```
# Migration: down
docker compose run migrate down -all
20241009/d example2 (17.537751ms)
20241008/d example (30.828173ms)
0/d initial (53.184593ms)
```

```
# Migration: up 2
docker compose run migrate up 2
0/u initial (32.891621ms)
20241008/u example (45.234002ms)
```
