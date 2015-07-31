<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

abstract class AbstractController extends Controller
{
    use DispatchesCommands, ValidatesRequests;

    /**
     * @var  \Illuminate\View\View
     */
    protected $layout;

    /**
     * Get the layout name used by the controller.
     *
     * @return string
     */
    abstract public function getLayoutName();

    /**
     * Set the content for the reponse.
     *
     * @return \Illuminate\View\View
     */
    public function setContent($view, $data = [])
    {
        if (! is_null($this->layout)) {
            return $this->layout->nest('content', $view, $data);
        }

        return view($view, $data);
    }

    /**
     * Get the layout used by the controller.
     *
     * @return \Illuminate\View\View|null
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * Set the layout used by the controller.
     *
     * @param  \Illuminate\View\View
     */
    public function setLayout(View $layout)
    {
        $this->layout = $layout;
    }

    /**
     * Setup the layout used by the controller.
     */
    protected function setupLayout()
    {
        if (! is_null($this->getLayoutName())) {
            $this->layout = view($this->getLayoutName());
        }
    }

    /**
     * {@inheritDoc}
     */
    public function callAction($method, $parameters)
    {
        $this->setupLayout();

        $response = call_user_func_array(array($this, $method), $parameters);

        if (is_null($response) && ! is_null($this->layout)) {
            $response = $this->layout;
        }

        return $response;
    }
}
