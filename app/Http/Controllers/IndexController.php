<?php namespace App\Http\Controllers;

class IndexController extends AbstractController
{
    /**
     * Return Angular layout.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return $this->getLayout();
    }

    /**
     * Get the layout name used by the controller.
     *
     * @return string
     */
    public function getLayoutName()
    {
        return 'layouts.angular';
    }
}
