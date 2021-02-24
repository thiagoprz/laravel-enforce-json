# Laravel JSON Enforcer Middleware

Laravel middleware built for json request enforcing. Just enable on any requests that are not desirable to be accessed without such headers (**content-type: application/json** and **accept: application/json**).

## Installation
Install it with composer:

`composer require thiagoprz/laravel-enforce-json`

Enable middleware on Http Kernel (app/Http/Kernel.php):

```
<?php
...
use Thiagoprz\EnforceJson\EnforceJson;

class Kernel extends HttpKernel
...
    protected $routeMiddleware = [
        ...
        'json' => EnforceJson::class,
    ];
```
