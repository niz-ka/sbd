# DBMS project
***

## Recommendations
- XAMPP (for easy PHP and MySQL installation)
- Composer (select PHP installed in XAMPP directory)
- Node.js
- PhpStorm

## Installation
Basically, you can easily clone this repository, install necessary dependencies and create .env file.

    git clone https://github.com/niz-ka/sbd.git
    cd sbd
    npm install
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan cache:clear 
    php artisan config:clear

Check your installation by typing:
    
    php artisan serve --port=5555

Finally, run your browser:

    http://127.0.0.1:5555/
