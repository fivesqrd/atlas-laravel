# Atlas-Laravel

A Laravel service provider for the Atlas library

## Install


```composer require fivesqrd/atlas-laravel```


Composer will automaticall register the provider and facade. If not:

In config/app.php register the Atlas Service Provider in the "providers" array:

```
    'providers' => array(
        // ...
        Atlas\Laravel\ServiceProvider::class,
    )
```
    
In config/app.php add the Atlas facade under "aliases":

```
    'aliases' => array(
        // ...
        'Atlas' => Atlas\Laravel\AtlasFacade::class,
    )
```

## Config

The config should be automatically created from the composer install. If not, run ```php artisan vendor:publish```

Atlas uses 'DB_DATABASE', 'DB_USERNAME' and 'DB_PASSWORD' values defined in the .env config file.

## Usage

Atlas facade is now available can be instantiated throughout the application like this:

```
\Atlas::model(Model\User::class)
  ->isActive(true)
  ->query()
  ->fetch()->all();
```
