#!/bin/bash
if [ ! -e .env ]
then
    # install Laravel dependencies
    composer install

    sudo mv .env.example .env
    sed -i -e 's/DB_USERNAME=root/DB_USERNAME=laravel/g' .env
    sed -i -e 's/DB_PASSWORD=/DB_PASSWORD=laravel/g' .env
    sed -i -e 's/DB_HOST=127.0.0.1/DB_HOST=database/g' .env
    sed -i -e 's/DB_PORT=3306/# DB_PORT=3306/g' .env

    php artisan key:generate

    php artisan migrate:refresh --seed
fi
