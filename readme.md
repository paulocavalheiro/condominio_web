<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

   version 5.6
   https://laravel.com/docs/5.6 

## Config

    - instale docker/docker-desktop
    https://www.docker.com/products/docker-desktop/

    -configure dados do banco .env
    DB_CONNECTION=mysql
    DB_HOST=db
    DB_PORT=3306
    DB_DATABASE=condominio_app
    DB_USERNAME=<defina user>  * deve ser o mesmo do docker-compose.yaml / app:user
    DB_PASSWORD=<defina senha>

    -inicier os contêineres
    docker-compose up -d

    -verifique o status
    docker ps

    -execute os comandos do artisan no conteiner app *obs pode ser preciso dar permissão na pasta www do app
    docker-compose exec app php artisan key:generate
    docker-compose exec app php artisan config:cache

    -execute os comandos no conteiner do db
    docker-compose exec db bash
    mysql -u root -p
    show databases;
    GRANT ALL ON <userdefinido>.* TO '<userdefinido>'@'%' IDENTIFIED BY '<senhadefinida>';
    FLUSH PRIVILEGES;
    EXIT;

    -execute novamente no app
    docker-compose exec app php artisan migrate
   



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
