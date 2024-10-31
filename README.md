# App Empleados

This application provides detailed information about the company's employees.

It allows you to view, create, edit and delete records quickly and easily, thus facilitating efficient human resources management.

## First steps

## Clone repository

Clone the repository and follow the steps below:

```bash
https://github.com/codewithsebas/app-empleados.git
```

## Configure your local project

Create a `.env` file and define the environment variables.
`.env`
Give a name to your database.
Enter your username if you have it configured, or use the default which is root.
Enter the password if you have it configured, or leave it empty.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:F6mpe7rKREQZb1FZ+/97za0kN9DDwYd4S4mKnhFF/D8=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=es
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
```

## Execute the necessary commands to create your database and insert the necessary data (Areas and Roles).

Runs migrations to create the database and tables automatically
```bash
php artisan migrate
```

To quickly insert Areas and Roles execute the following commands
```bash
php artisan insert:areas
php artisan insert:roles
```

## Install the necessary dependencies

```bash
composer install
```

## You can now run the project

By executing the following commands

```bash
php artisan serve
```

And now open [http://localhost:8000/empleados](http://localhost:8000/empleados) and you can use the App.

## Technologies used

For this technical test, I decided to use Laravel, as it allowed me to optimize the development and better organize the structure of the project.

For the visual design, I opted for Bootstrap, which facilitates the creation of attractive and functional interfaces. I also used Font Awesome to add some icons that enrich the user experience. Here are the resources I used:

Bootstrap Documentation: [https://getbootstrap.com/](https://getbootstrap.com/) <br/>
Font Awesome Documentation:[https://fontawesome.com/](https://fontawesome.com/)