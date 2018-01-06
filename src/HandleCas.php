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
        phpCAS::setNoCasServerValidation();

        if ($this->_isLogoutRequest($request))
            phpCAS::handleLogoutRequests(true, Config::get('cas.allowed_clients'));
        else
            phpCAS::forceAuthentication();

        return $next($request);
    }

    private function _isLogoutRequest(Request $request)
    {
        $bool = $request->input('logoutRequest', false);

        return $bool;
    }
}