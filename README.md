<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Hi there :)

###Introduction

The project built using a monolithic architecture (https://lucid-architecture.gitbook.io/docs/) with different services:
- Client (for the not auth user)
```shell
./app/Services/Client/*
```
- Dashboard (for the auth user)
```shell
./app/Services/Dashboard/*
```
Designed for easy growth with the `Adding New Services`/`Removing Existing Services`

###Installation 
####(Docker)

Package https://laravel.com/docs/8.x/sail was provided in the project architecture to provide unified configurations
for different virtual machines. 

- Folder with configurations for docker:
```shell
./docker/*
```

1. - File docker-compose:
```shell
./docker-compose.yml
```

2. - Start Docker:
```shell
docker-compose up
```

3.1. - Run script for the executing to the containers:
```shell
./docker/bash.sh
```
3.2. - Choose PHP container.

####(Laravel)

4. - Install Composer packages:
```shell
composer i
```

5. - Generate key for the Application:
```shell
php artisan key:generate
```

6. - Migration and Seeding:
```shell
php artisan migrate --seed
```

7. - Install NPM packages:
```shell
npm i
```

8. - Build assets:
```shell
npm run prod
```

###See you soon!
