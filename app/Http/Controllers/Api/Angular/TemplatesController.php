<?php namespace App\Http\Controllers\Api\Angular;

use Dingo\Api\Http\Response\Factory as Response;
use Illuminate\Contracts\View\Factory as ViewFactory;
use App\Http\Controllers\Api\AbstractController;
use App\Http\Requests\Api\Angular\TemplateRequest;

class TemplatesController extends AbstractController
{
    /**
     * @var \Illuminate\View\Factory
     */
    protected $viewFactory;

    /**
     * Bind instances to the class.
     *
     * @param  \Dingo\Api\Response\Factory  $response
     * @param  \Illuminate\Contracts\View\Factory  $viewFactory
     */
    public function __construct(
        Response $response,
        ViewFactory $viewFactory
    ) {
        parent::__construct($response);

        $this->viewFactory = $viewFactory;
    }

    /**
     * Return an angular template partial.
     *
     * @return \Illuminate\View\View
     */
    public function template(TemplateRequest $request)
    {
        $template = $request->get('template');

        if ($this->viewFactory->exists($template)) {
            return $this->viewFactory->make($template);
        }

        return $this->response->errorNotFound();
    }
}
