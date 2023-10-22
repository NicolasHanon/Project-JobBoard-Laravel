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
    mysql> CREATE DATABASE JobBoard_DB;
    mysql> GRANT ALL PRIVILEGES ON JobBoard_DB.*;
    mysql> FLUSH PRIVILEGES;

Copy the .env file : 

    cp .env.example .env

Configure environment variables : 

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

You can now access the server at [http://localhost:8000/login](http://localhost:8000/login)

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

# Testing the application

Run the laravel development server

    php artisan serve

The application can be accessed at

    http://localhost:8000/index

Here are the users available to you : 

# Admin user (role n°1) :

    Email : emma.smith@email.com
    Password : password123

Admin's routes : 

    localhost:8000/admin/
    localhost:8000/index/
    localhost:8000/candidates/{job_id}/
    localhost:8000/company/
    localhost:8000/login/
    localhost:8000/logout/
    localhost:8000/myjobapplications/
    localhost:8000/myjoblisting/
    localhost:8000/newjob/
    localhost:8000/register/
    localhost:8000/user/

# Recruiter user (role n°2) :

    Email : alex.williams@email.com
    Password : password123

Recruiter's route : 

    localhost:8000/candidates/{job_id}/
    localhost:8000/company/
    localhost:8000/login/
    localhost:8000/logout/
    localhost:8000/myjoblisting/
    localhost:8000/newjob/
    localhost:8000/register/
    localhost:8000/user/

# Candidate user (role n°3) : 

    Email : john@doe.com
    Password : password123

Candidate's route : 

    localhost:8000/index/
    localhost:8000/login/
    localhost:8000/logout/
    localhost:8000/myjobapplications/
    localhost:8000/register/
    localhost:8000/user/
