# Boilerplate Laravel PHP/7.2 w/Selenium

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

To be continued...

## Running Tests

## Connecting to gui with VNC