<?php namespace App\Http\Controllers\Api\Uuid;

use App\Http\Controllers\Api\AbstractController;
use App\Repositories\Uuid\UuidRepositoryInterface;
use App\Traits\TransformerTrait;

class UuidController extends AbstractController
{
    use TransformerTrait;

    /**
     * @var \App\Repositories\Uuid\UuidRepositoryInterface
     */
    protected $uuidRepository;

    /**
     * @var string
     */
    protected $transformer = 'App\Transformers\Uuid\UuidTransformer';

    /**
     * Bind instances to the class.
     *
     * @param  \App\Repositories\Uuid\UuidRepositoryInterface  $uuidRepository
     */
    public function __construct(UuidRepositoryInterface $uuidRepository)
    {
        $this->uuidRepository = $uuidRepository;
    }

    /**
     * Create a listing of uuids.
     *
     * @return \Dingo\Api\Http\ResponseBuilder
     */
    public function index()
    {
        $uuids = $this->uuidRepository->query();

        if ($uuids->isEmpty()) {
            return $this->response->noContent();
        }

        return $this->response()->collection(
            $uuids,
            $this->createTransformer()
        );
    }

    /**
     * Returns the transformer.
     *
     * @return string
     */
    public function getTransformer()
    {
        return $this->transformer;
    }

    /**
     * Runtime override of the transformer.
     *
     * @param  string  $transformer
     * @return $this
     */
    public function setTransformer($transformer)
    {
        $this->transformer = $transformer;

        return $this;
    }
}
