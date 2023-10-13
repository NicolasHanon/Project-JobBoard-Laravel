# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone git@github.com:EpitechMscProPromo2026/T-WEB-501-LYO_20.git

Switch to the repo folder

    cd T-WEB-501-LYO_20

Install all the dependencies using composer

    composer install

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Seed the Database (in that order)

    php artisan db:seed --class:UserSeeder
    php artisan db:seed --class:RoleSeeder
    php artisan db:seed --class:CompanieSeeder
    php artisan db:seed --class:JobSeeder
    php artisan db:seed --class:ApplicationSeeder

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
    
The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).

# Code overview

## Dependencies

- [jwt-auth](https://github.com/tymondesigns/jwt-auth) - For authentication using JSON Web Tokens
- [laravel-cors](https://github.com/barryvdh/laravel-cors) - For handling Cross-Origin Resource Sharing (CORS)

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers/Api` - Contains all the api controllers
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the api routes defined in api.php file and all the web routes in web.php file

# Testing API

Run the laravel development server

    php artisan serve

The api can be accessed at

    http://localhost:8000/api
