<?php

use \Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::get('/cas/logout', function () {

    phpCAS::logout([
        'service' => Config::get('cas.logout_redirect_to')
    ]);
});

Route::post('/cas/logout', function () {

    phpCAS::handleLogoutRequests(true, Config::get('cas.allowed_clients'));
});