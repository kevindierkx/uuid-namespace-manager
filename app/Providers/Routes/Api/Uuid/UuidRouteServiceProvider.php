<?php namespace App\Providers\Routes\Api\Uuid;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class UuidRouteServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'App\Http\Controllers\Api\Uuid';

    /**
     * Define the routes for the UUID listing API.
     *
     * @param  \Illuminate\Routing\Router  $router
     */
    public function map(Router $router)
    {
        $router = $this->app->make('api.router');

        $router->group([
            'prefix' => 'api',
            'version' => 'v1',
            'namespace' => $this->namespace,
        ], function ($router) {

            $router->get('uuid', [
                'as' => 'uuid.index',
                'uses' => 'UuidController@index',
            ]);

        });
    }
}
