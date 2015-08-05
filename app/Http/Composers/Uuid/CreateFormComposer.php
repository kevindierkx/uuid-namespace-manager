<?php namespace App\Http\Composers\Uuid;

use Illuminate\View\View;
use Kris\LaravelFormBuilder\FormBuilder;

class CreateFormComposer
{
    /**
     * Bind instances to the class.
     *
     * @param
     */
    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    /**
     * Compose the create namespace form.
     *
     * @param  \Illuminate\View\View  $view
     */
    public function compose(View $view)
    {
        $view->with(
            'createNamespaceForm',
            $this->formBuilder->create('App\Http\Forms\Uuid\CreateForm')
        );
    }
}
