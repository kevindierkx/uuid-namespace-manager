<?php namespace App\Http\Controllers\Api;

use Dingo\Api\Http\Response\Factory as Response;
use Illuminate\Routing\Controller;

abstract class AbstractController extends Controller
{
    /**
     * @var  \Dingo\Api\Response\Factory
     */
    protected $response;

    /**
     * Bind instances to the class.
     *
     * @param  \Dingo\Api\Response\Factory  $response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
}
