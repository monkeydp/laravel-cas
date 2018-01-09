<?php

namespace Monkeydp\Cas;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use phpCAS;

class HandleCas
{
    public function handle(Request $request, Closure $next)
    {
        $cert = Config::get('cas.server_cert');

        if ($cert)
            phpCAS::setCasServerCACert($cert);
        else
            phpCAS::setNoCasServerValidation();

        phpCAS::forceAuthentication();

        return $next($request);
    }
}