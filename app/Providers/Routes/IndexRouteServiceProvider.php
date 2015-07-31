<?php namespace App\Providers\Routes;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class IndexRouteServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define the routes for authentication.
     *
     * @param  \Illuminate\Routing\Router  $router
     */
    public function map(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace,
        ], function ($router) {

            // Index - placeholder
            $router->any('{any}', [
                'as' => 'index',
                'uses' => 'IndexController@index',
            ])->where('any', '.*');

        });
    }
}
