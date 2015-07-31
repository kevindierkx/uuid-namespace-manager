<?php namespace App\Providers\Routes\Api\Angular;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class TemplatesRouteServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $namespace = 'App\Http\Controllers\Api\Angular';

    /**
     * Define the routes for the directories listing API.
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

            // Index - placeholder
            $router->get('ng-templates', [
                'as' => 'angular.templates',
                'uses' => 'TemplatesController@template',
            ]);

        });
    }
}
