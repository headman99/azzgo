<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About AzzGo

## Required
- xampp 7.3.5-1-VC15 x64
- xampp control 3.2.3
- apache 2.4.39.0
- php >= 7.3.5
- xdebug 2.9.6
- MariaDB 10.1.40
- Laravel >= 8.x

## Package
- Passport > 10

### Production Installation:
```
git clone https://github.com/BluesDevelopers/GSG-BE.git
composer install --no-dev --optimize-autoloader
rename .env.example to .env
php artisan key:generate
php artisan config:cache
```

## Dev Installation:
run command

```
composer update
rename .env.example to .env
php artisan key:generate
php artisan config:cache
```
For download all required package 

### Configure

Create a database instace with utf8mb4_unicode_ci charset and change paramter in .env to connect with database

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<name of database>
DB_USERNAME=<user name>
DB_PASSWORD=<password>
```

run command

```
php artisan migrate
php artisan passport:install --uuids
```

Create mock user
```
php artisan tinker
User::factory()->create();
```

Create Models
```
php artisan krlove:generate:model Nazione --table-name=nazioni --namespace=App\Models --output-path=Models
```


Create Enum
```
php artisan make:enum UserStatusEnum
```

Create Resource
```
php artisan make:resource UserResource
```
