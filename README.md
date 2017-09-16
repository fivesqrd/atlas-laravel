# Atlas-Laravel

```composer require fivesqrd/atlas-laravel```


In config/app.php register the Atlas Service Provider in the "providers" array:

```
    'providers' => array(
        // ...
        Atlas\Laravel\AtlasServiceProvider::class,
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

Add the below to ```app/config/atlas.php```

```
return [
    'read' => [
        'dsn'      => 'mysql:dbname=' . env('DB_DATABASE') . ';host=' . env('DB_HOST'),
        'username' => env('DB_USERNAME'),
        'password' => env('DB_PASSWORD'),
    ],
    'write' => [
        'dsn'      => 'mysql:dbname=' . env('DB_DATABASE') . ';host=' . env('DB_HOST'),
        'username' => env('DB_USERNAME'),
        'password' => env('DB_PASSWORD'),
    ],
]
```

## Usage

```
Atlas::model(Model\User::class)
  ->isActive(true)
  ->query()
  ->fetch()->all();
```
