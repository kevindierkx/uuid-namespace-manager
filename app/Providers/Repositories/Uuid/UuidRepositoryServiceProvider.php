<?php namespace App\Providers\Repositories\Uuid;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Uuid\UuidRepository;

class UuidRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->setupContainerBindings();
    }

    /**
     * Setup container bindings.
     */
    protected function setupContainerBindings()
    {
        $this->app->bind('App\Repositories\Uuid\UuidRepositoryInterface', function ($app) {
            return $app['uuid'];
        });
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerUuids();
    }

    /**
     * Register the UUIDs.
     */
    public function registerUuids()
    {
        $this->app->bindShared('uuid', function ($app) {
            return new UuidRepository(
                $app['events']
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'uuid',
            'App\Repositories\Uuid\UuidRepositoryInterface',
        ];
    }
}
