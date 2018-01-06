<?php

use Illuminate\Support\Facades\Config;

return [
    'server_version'     => '3.0',
    'server_host'        => 'localhost',
    'server_port'        => 8443,
    'server_uri'         => '/cas',
    'allowed_clients'    => [],
    'logout_redirect_to' => Config::get('app.url'),
];