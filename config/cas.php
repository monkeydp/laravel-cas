<?php

/*
|--------------------------------------------------------------------------
| Central Authentication Service
|--------------------------------------------------------------------------
|
*/

$CAS_ALLOWED_CLIENTS = env('CAS_ALLOWED_CLIENTS');

return [
    'server_version'     => (string)env('CAS_SERVER_VERSION', '3.0'),
    'server_host'        => (string)env('CAS_SERVER_HOST', 'your.cas-server.host'),
    'server_port'        => (int)env('CAS_SERVER_PORT', 8443),
    'server_uri'         => (string)env('CAS_SERVER_URI', ''),
    'server_cert'        => (string)env('CAS_SERVER_CERT', ''),
    'allowed_clients'    => (array)($CAS_ALLOWED_CLIENTS ? explode(',', $CAS_ALLOWED_CLIENTS) : []),
    'logout_redirect_to' => (string)env('CAS_LOGOUT_REDIRECT_TO', 'localhost'),
];