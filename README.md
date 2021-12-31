# DBMS project
***

## Recommendations
- XAMPP (for easy PHP and MySQL installation)
- Composer (select PHP installed in XAMPP directory)
- Node.js
- PhpStorm

## Installation
Firstly, clone this repository, install dependencies and prepare `.env` file.

    git clone https://github.com/niz-ka/sbd.git
    cd sbd
    npm install
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan cache:clear 
    php artisan config:clear
    
Next, set database connection in your `.env` file. For example:
     
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=DB
    DB_USERNAME=root
    DB_PASSWORD=
    
Run migrations and fill database with dummy content:
    
    php artisan migrate
    php artisan db:seed

Run server:
    
    php artisan serve --port=5555

Finally run your browser:

    http://127.0.0.1:5555/
