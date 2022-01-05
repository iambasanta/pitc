[![PITC](./public/backend/images/logo/logo.png)](https://primeitclub.com)

# About Prime IT Club

Prime IT Club is a student-run club working towards the goal of bridging the gap between academia and industry.

## Contributing

Thank you for considering contributing to the Prime IT Club's website. We are hoping that you have some prior knowledge about `PHP` and `Laravel`. Read `Local Installation Guide` to set the development environment (local).

### Local Installation Guide

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x)

Clone the repository (or download the zip file and extract it)

    git clone https://github.com/iambasanta/pitc.git

Switch to the project folder

    cd pitc

Install composer dependencies

    composer install

Copy the example `.env.example` in `.env` file

    cp .env.example .env

Open and make the required configuration changes in the `.env` file

-   `DB_DATABASE`
-   `DB_USERNAME`
-   `DB_PASSWORD`

Generate an app encryption key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Seed the database (OPTIONAL)

    php artisan db:seed

This command will seed four admins having different roles as shown bleow :

| Email                | Password | Role           |
| :------------------- | :------: | :------------- |
| superadmin@pitc.com  | password | Super Admin    |
| blogadmin@pitc.com   | password | Blog Manager   |
| eventadmin@pitc.com  | password | Event Manager  |
| memberadmin@pitc.com | password | Member Manager |

Start the local development server

    php artisan serve

Now you can visit http://localhost:8000 on your web-broswer to access the website.
