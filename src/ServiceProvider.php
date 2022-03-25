<?php

namespace Atlas\Laravel;

use Atlas;
use Illuminate\Support;
use Illuminate\Foundation\Application as LaravelApplication;

/**
 * Atlas service provider
 */
class ServiceProvider extends Support\ServiceProvider
{
    const VERSION = '3.2.0';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
    
    /**
     * Bootstrap the configuration
     *
     * @return void
     */
    public function boot()
    {
        /* Path to default config file */
        $this->publishes([
            dirname(__DIR__) . '/config/atlas.php' => config_path('atlas.php')
        ], 'atlas-config');

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/config/atlas.php', 'atlas'
        );

        $this->app->singleton('atlas', function ($app) {
            $config = $app->make('config')->get('atlas');
            return new Factory($config);
        });

        $this->app->alias('atlas', 'Atlas');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['atlas'];
    }
}
