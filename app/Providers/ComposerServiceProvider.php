<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory as ViewFactory;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * @var  array
     */
    protected $viewComposers = [
        'uuid.create' => [
            'App\Http\Composers\Uuid\CreateFormComposer',
        ],
    ];

    /**
     * Register any composers.
     */
    public function register()
    {
        $factory = $this->app->make('view');

        foreach ($this->viewComposers as $view => $composers) {
            foreach ($composers as $composer) {
                $factory->composer($view, $composer);
            }
        }
    }
}
