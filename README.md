# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x/installation)

You have to have mySQLServer installed and configured (or MariaDB) : 

    sudo apt install mysql-server

Clone the repository

    git clone git@github.com:EpitechMscProPromo2026/T-WEB-501-LYO_20.git

Switch to the repo folder

    cd T-WEB-501-LYO_20

Install all the dependencies using composer

    composer update
    composer install
    composer require doctrine/dbal

Enter mySQL CLI as admin and create the user + db : 

    sudo mysql
    mysql> CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
    mysql> GRANT ALL PRIVILEGES ON JobBoard_DB.*;
    mysql> FLUSH PRIVILEGES;
    mysql> CREATE DATABASE JobBoard_DB;

Copy the .env file and configure environment variables

    cp .env.example .env

Edit the .env file as follows : 

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=JobBoard_DB
    DB_USERNAME=username # the one created in the previous step
    DB_PASSWORD=password # same

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Seed the Database (in that order)

    php artisan db:seed --class=RoleSeeder
    php artisan db:seed --class=CompanieSeeder
    php artisan db:seed --class=UserSeeder
    php artisan db:seed --class=JobSeeder
    php artisan db:seed --class=ApplicationSeeder

Generate app key before starting the local development server

    php artisan key:generate

Start the local development server

    php artisan serve

You can now access the server at [http://localhost:8000/index](http://localhost:8000/index)

    /newjob
    /login
    /index
    /myjoblisting
    /myapplicationslisting
    
The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).

    /api/index/{id}/
    /api/newjob/add

# Code overview

## Folders

The folders we used for this project : 

app
- `app/Http/Controllers/` - Contains all controllers used to interact with the database
- `app/Http/Middleware/` - Contains Admin, Company and User Middleware/ which decide whether they should allow a user to access the route depending on his roles
- `app/Http/Models/` - Contains the models used for this project
database
- `database/factories` - Contains the model factory for all the models (generate fake data for testing purposes)
- `database/migrations` - Contains all the database migrations (create the tables in the database)
- `database/seeders` - Contains the database seeder (fill the previously created tables with data)
public
- `public/js` - JavaScript scripts (mostly fetch and styling)
- `public/stylesheet`- Scss/css files
- `public/svg` - Icons used in the web app
resources
- `resources/views` - Contains all the views (we used blade templates)
routes
- `routes/api.php` - Contains all CRUD operations
- `routes/web.php` - Every page we need to load are here

# Testing API

Run the laravel development server

    php artisan serve

The api can be accessed at

    http://localhost:8000/api

    POST      api/admin/addRow/{table} ................................ AdminController@addRow
    GET|HEAD  api/admin/deleteRow/{id}/{table} ..................... AdminController@deleteRow
    GET|HEAD  api/admin/getTableData/{tableName} ............... AdminController@showTableData
    GET|HEAD  api/admin/initTable ................................... AdminController@getTable
    POST      api/admin/updateRow/{table} .......................... AdminController@updateRow
    POST      api/application/add ................................ ApplicationController@store
    GET|HEAD  api/application/getApplicants/{jobId} ...... ApplicationController@getApplicants
    GET|HEAD  api/application/getApplyData/{userId}/{jobId} ApplicationController@getApplyData
    GET|HEAD  api/application/getApplyJob/{userId} ......... ApplicationController@getApplyJob
    DELETE    api/application/remove/{id} ...................... ApplicationController@destroy
    GET|HEAD  api/application/removeApply/{userId}/{jobId} . ApplicationController@removeApply
    POST      api/application/updateMessage/{userId}/{jobId} ApplicationController@updateMess…
    POST      api/application/updateResponse/{userId}/{jobId} ApplicationController@updateRes…
    GET|HEAD  api/application/{id} ................................ ApplicationController@show
    PUT       api/application/{id} .............................. ApplicationController@update
    POST      api/companie/add ....................................... CompanyController@store
    GET|HEAD  api/companie/getCompany/{companyId} ............... CompanyController@getCompany
    DELETE    api/companie/remove/{id} ............................. CompanyController@destroy
    POST      api/companie/updateCompany/{companyId} ......... CompanyController@updateCompany
    GET|HEAD  api/companie/{id} ....................................... CompanyController@show
    PUT       api/companie/{id} ..................................... CompanyController@update
    GET|HEAD  api/index/getJobs ...................................... IndexController@getJobs
    GET|HEAD  api/index/{id} .............................................. JobController@show
    GET|HEAD  api/job/getJobListing/{companyId} .................. JobController@getJobListing
    GET|HEAD  api/job/getJobsToApply/{userId} ................... JobController@getJobsToApply
    GET|HEAD  api/job/remove/{id} ...................................... JobController@destroy
    POST      api/job/updateJob/{jobId} .............................. JobController@updateJob
    POST      api/newjob/add ............................................. JobController@store
    DELETE    api/newjob/remove/{id} ................................... JobController@destroy
    PUT       api/newjob/{id} ........................................... JobController@update
    POST      api/user/add .............................................. UserController@store
    GET|HEAD  api/user/getCompanyId/{userId} ..................... UserController@getCompanyId
    DELETE    api/user/remove/{id} .................................... UserController@destroy
    POST      api/user/update/{userId} ................................. UserController@update
    GET|HEAD  api/user/{id} .............................................. UserController@show

