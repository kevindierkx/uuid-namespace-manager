<?php namespace App\Http\Forms\Uuid;

use Kris\LaravelFormBuilder\Form;

class CreateForm extends Form
{
    /**
     * Build the authentication form.
     */
    public function buildForm()
    {
        $this->add('name', 'text', [
            'label' => 'Name',
            'wrapper' => ['show-errors'],
            'attr' => [
                'ng-model' => 'uuid.name',
                'autofocus',
                'required',
            ],
            'help_block' => [
                'text' => trans('validation.required', ['attribute' => 'name']),
                'tag' => 'p',
                'attr' => [
                    'class' => 'help-block error',
                    'ng-if' => 'createForm.name.$error.required',
                ],
            ],
        ]);

        $this->add('description', 'text', [
            'label' => 'Description',
            'attr' => ['ng-model' => 'uuid.description'],
        ]);

        $this->add('create', 'submit', [
            'label' => 'Create namespace',
            'attr' => ['class' => 'btn btn-primary btn-block'],
        ]);
    }
}
