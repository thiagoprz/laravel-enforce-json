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

Apply the middleware on desired routes:

`api.php` or `web.php`
```
<?php
...
// Example: user login
Route::post('/register', 'AuthenticationController@register')->middleware('json');
...
// Example: upload of photo (note that you must pass true as first argument to the middleware allowing uploads) 
Route::post('/uploadAvatar', 'ProfileController@uploadAvatar')->middleware('json:true');
...
```
