# brazil-geographic-api
brazil-geographic-api retrieves geographic data about Brazilian regions, states, and cities. Api documentation available at this [link](https://app.swaggerhub.com/apis-docs/alm.felipe/brazil-geographic-api/1.0.0). API [sample base url](http://brazil-geographic-api.almfelipe.com/api).

### Built with
* [Laravel](https://laravel.com/)
* [PHP](https://www.php.net/)

## Getting started

To get a local copy up and running follow these simple steps.

### Prerequisites

Make sure you have PHP 7.3, Composer, and MySql 5.7 installed in your development environment.  


### Clone the repository
```
git clone https://github.com/almfelipe/brazil-geographic-api.git
```

### Config .env file
```
cd [your-project-directory]
```

linux:
```
cp .env.example .env
php artisan key:generate
```

windows:
```
copy .env.example .env
php artisan key:generate
```

### Configure database
Configure a database as described at [brazil-geographic-data](https://github.com/almfelipe/brazil-geographic-data).

Set database host, name, password, and port on project's .env file. 
```
DB_CONNECTION=mysql
DB_HOST=xxx
DB_PORT=xxx
DB_DATABASE=xxx
DB_USERNAME=xxx
DB_PASSWORD=xxx
```

### Install all dependencies
```
composer install
```

### Run local server
```
php artisan serve
```

## Acknowledgements

* [Laravel Model Generator](https://github.com/reliese/laravel)
* [brazil-geographic-data](https://github.com/almfelipe/brazil-geographic-data)
