# microblogging

This is a simple api Microblogging project.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Prerequisites

### Laravel version

```
"laravel/framework": "5.8.*",
```

### Postman

### System dependencies

We need to install **Laravel Passport package** via the composer dependency manager.

```
"laravel/passport": "^7.3",
```

```bash
composer require laravel/passport
```

### Adding Laravel Passport

Laravel Passport requires some steps to set up properly.

### Service Provider

You need to add **Se rvice Provider** in the **config/app.php** file. So, open the file and add the Service Provider in the providers array.

```php
'providers' => [
    ....
    Laravel\Passport\PassportServiceProvider::class,
]
```

## Migration and Installation

Setup database credentials in **.env file**.

```.env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=xxxx
DB_USERNAME=xxxx
DB_PASSWORD=xxxx
```

### Migrate & seed

Laravel Passport comes up with migration for passport tables that are required to be in our database. Passport Migrations are used for storing tokens and client information. Run migration command to migrate schemas to your database and seed data for testing.

```bash
php artisan migrate:refresh --seed
```

Next, it is required to install passport using the command below. It will generate encryption keys required to generate secret access tokens **and every time you migrate database you need to run this command**.

```bash
php artisan passport:install
```

Note: ignore dublication error in follower_following table seed its due to random generation.

## Stroage Link

To create the symbolic link, you may use the storage:link Artisan command:

```bash
php artisan storage:link
```

# Guide

Run server.

```bash
php artisan serve
```

## Login

You can login with seeded data the default password is 123456

**When testing Details API or any API that requires a user to be authenticated, you need to specify two headers. You must specify access token as a Bearer token in the Authorization header. Basically, you have to concatenate the access token that you received after login and registration with the Bearer followed by a space.**

```
'headers' => [
    'Accept' => 'application/json',
    'Authorization' => 'Bearer '. $accessToken,
]
```

## Register API

**Route: POST** http://127.0.0.1:8000/api/register
You need body form data name,email,password,img(file) and make sure of that
```
'headers' => [
    'Accept' => 'application/json',
]
```

## Login

**Route: POST** http://127.0.0.1:8000/api/login

## All Users

**Route: GET** http://127.0.0.1:8000/api/users

## User detail

**Route: GET** http://127.0.0.1:8000/api/user

## Follow user

**Route: POST** http://127.0.0.1:8000/api/users/{profileId}/follow

## Unfollow user

**Route: POST** http://127.0.0.1:8000/api/users/{profileId}/unfollow

## User timeline

**Route: GET** http://127.0.0.1:8000/api/timeline

## Save tweet

**Route: POST** http://127.0.0.1:8000/api/tweets

## User tweets

**Route: GET** http://127.0.0.1:8000/api/tweets

## Show tweet

**Route: GET** http://127.0.0.1:8000/api/tweets/{tweet}

## Delete tweet

**Route: DELETE** http://127.0.0.1:8000/api/tweets/{tweet}

# Enjoy
