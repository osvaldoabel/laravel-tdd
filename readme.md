
## what actually is this project ?
It is a Laravel basic project using TDD and uses for dev environment.

##installation
After clone this repo, go to the root of project, and then: 

``` sh
cd .docker
```
``` sh
docker-compose up -d
```

Run Migrations

``` sh
docker-compose exec app php artsan migrate
```
Run application
``` sh
docker-compose exec app php artsan serve
```
