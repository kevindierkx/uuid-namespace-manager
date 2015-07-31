<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * @var  array
     */
    protected $routeServiceProviders = [

        // Index - placeholder
        'App\Providers\Routes\IndexRouteServiceProvider',

        // API

        // Angular
        'App\Providers\Routes\Api\Angular\TemplatesRouteServiceProvider',

    ];

    /**
     * Register any route service providers.
     */
    public function register()
    {
        foreach ($this->routeServiceProviders as $provider) {
            $this->app->register($this->createProvider($provider));
        }
    }

    /**
     * Create a new provider instance.
     *
     * @param  string  $provider
     * @return \Illuminate\Support\ServiceProvider
     */
    protected function createProvider($provider)
    {
        return new $provider($this->app);
    }
}
