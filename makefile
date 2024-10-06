laravel_migrate:
    cd ./laradock/
    docker-compose exec workspace bash
    php artisan migrate

laravel_clear_cache:
    cd ./laradock/
    docker-compose exec workspace bash
    php artisan config:clear
    php artisan cache:clear
    php artisan view:clear
    php artisan route:clear
    php artisan clear-compiled
    php artisan optimize:clear

laravel_optimize:
    cd ./laradock/
    docker-compose exec workspace bash
    php artisan optimize


