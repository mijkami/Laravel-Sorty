<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Laravel Sorty

Projet de gestion de sorties parapente.
Live (partial) : [Parapangue](http://sorties.16mb.com/)
Live prod : [Hostinger](http://sorty.890m.com/) or [Heroku](http://laravelsorty.herokuapp.com/)

# Requirements:

- [Composer](https://getcomposer.org/download/) (for windows users, [here is the .exe direct link](https://getcomposer.org/Composer-Setup.exe))
- a database management system (like `MySQL` or `MariaDB`)
- optional :
    - administration tool for the DB (`PhpMyAdmin`)
    - php server (we will use laravel own `php artisan serve`)

# Install the projet:

- Clone the project
- Go to the application folder using `cd` command on your cmd or terminal
- Run `composer install` on your cmd / terminal
- Create an new database (named for example `sorty`, using a tool like phpmyadmin)
- Copy `.env.example` file to `.env` on the root folder
- Open your `.env` file and change the database name (`DB_DATABASE`), username (`DB_USERNAME`) and password (`DB_PASSWORD`) fields corresponding to your configuration
- Run the following commands on your cmd or terminal in the project folder:
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan db:seed`
- `php artisan serve`
- Go to [localhost:8000](http://localhost:8000/)


# Mailer + "mail-catcher"-like for dev environment

- Install [MailDev](https://danfarrelly.nyc/MailDev/)
- Run `maildev` on an other cmd / terminal
- Open your `.env` file and do the following changes:
    - `MAIL_HOST=127.0.0.1`
    - `MAIL_PORT=1025`
- After the `MAIL_PORT` line, add the following lines to show which within the sent mails which address was supposed to send these:
    - `MAIL_FROM_ADDRESS=test@test.com`
    - `MAIL_FROM_NAME=test@test.com`
    
- Run the following commands on your cmd or terminal in the project folder:
- `php artisan cache:clear`
- `php artisan route:clear`
- `php artisan view:clear`
- Go to the main application at [localhost:8000](http://localhost:8000/)
- Log as an admin (create one or use the one from DatabaseSeeder.php)
- Send emails through the admin panel / links
- Go to [localhost:1080](http://localhost:1080/) to access the MailDev interface and check the caught emails

