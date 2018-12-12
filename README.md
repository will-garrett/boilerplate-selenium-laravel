# Boilerplate Laravel PHP/7.2 w/Selenium
fully testable end to end development environment for a Laravel PHP application. The application will consist of:
- __PHP-fpm:7.2__ environment for running laravel
- __Nginx__ webserver for serving the php-fpm environment over http
- __MariaDb__ MySQL server as a database for our laravel application
- __Redis__ In-memory data structure store for laravel caching
-  __Selenium__ standalone server : A Web Browser automation server w/debug enabled

## Screenshot
![VNC of Selenium ran from laravel in docker](https://www.willgarrett.io/img/laravel-dusk_selenium_full.png "VNC of Selenium ran from laravel in docker")


## Setup
Download the repository
```bash
    git clone git@github.com:will-garrett/boilerplate-selenium-laravel.git
```

Start containers
```bash
    docker-compose up -d
```

Enter Laravel App Container & complete .env and composer setup
```bash
    docker exec -it boiler_laravel bash
    composer update
    php artisan key:generate
    php artisan migrate
```

## To be continued...
- Running Tests
- Connecting to gui with VNC