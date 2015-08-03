<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $repositoryServiceProviders = [

        // UUID
        'App\Providers\Repositories\Uuid\UuidRepositoryServiceProvider',

    ];

    /**
     * Register any repository service providers.
     */
    public function register()
    {
        foreach ($this->repositoryServiceProviders as $provider) {
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
