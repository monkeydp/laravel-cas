<?php

use \Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::any('/cas/logout', function () {
    phpCAS::logout([
        'service' => Config::get('cas.logout_redirect_to')
    ]);
});