# Laravel CAS

Based on https://github.com/apereo/phpCAS

## About

Simple CAS Authentication for Laravel 5.5

## Features

- Single Sign On
- Single Logout

## Requirement

- Laravel >= 5.5

## Installation

Require the `monkeydp/laravel-cas` package in your composer.json and update your dependencies:

```$xslt
$ composer require monkeydp/laravel-cas
```

## Configuration

The defaults are set in `config/cas.php`. Copy this file to your own config directory to modify the values. You can publish the config using this command:

```$xslt
$ php artisan vendor:publish --provider="Monkeydp\Cas\ServiceProvider"
```

>This command not working in `cmd`

In your `.env`, configuration is as follows

```$xslt
CAS_SERVER_VERSION=3.0
CAS_SERVER_HOST=your.cas.server.host
CAS_SERVER_PORT=443
CAS_SERVER_URI=/cas

# An array of host names allowed to send logout requests, separated by ","
CAS_ALLOWED_CLIENTS=192.168.10.114,192.168.20.10

# The url you want to redirect to after logout
CAS_LOGOUT_REDIRECT_TO=http://your.project.host
```

## Register Route Middleware

If you want to allow CAS on a specific route, add the `HandleCas` middleware to your `$routeMiddleware` in `app/Http/Kernel.php`:

```$xslt
    protected $routeMiddleware = [
        // ...
        'cas' => \Monkeydp\Cas\HandleCas::class,
    ];
```

## Example

### Single sign on

In `routes/web.php`, use `cas` middleware for any route has to login:

```$xslt
Route::group(['middleware' => 'cas'], function () {

    Route::get('/home', function(){
        return 'HOME';
    });
});
```

When you access `http://your.project.host/home`, the browser will redirect to `Login Page` of your `CAS Server`

### Single Logout

Just access `http://your.project.host/cas/logout`

>Use `Get` request
