<?php

namespace Monkeydp\Cas;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use phpCAS;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            phpCAS::setDebug();
            phpCAS::setVerbose(true);
        }

        $this->mergeConfigFrom($this->configPath(), 'cas');

        $cas = $this->app['config']->get('cas');

        phpCAS::client(
            $cas['server_version'],
            $cas['server_host'],
            $cas['server_port'],
            $cas['server_uri']
        );
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->publishes([$this->configPath() => config_path('cas.php')]);
    }

    protected function configPath()
    {
        return __DIR__ . '/../config/cas.php';
    }
}