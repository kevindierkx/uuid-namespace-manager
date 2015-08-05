<?php namespace App\Http\Controllers\Api\Uuid;

use App\Http\Controllers\Api\AbstractController;
use App\Repositories\Uuid\UuidRepositoryInterface;
use App\Traits\TransformerTrait;
use App\Http\Requests\Api\Uuid\StoreUuidRequest;

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
     * Return a listing of UUIDs.
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
     * Store a new UUID.
     *
     * @param  \App\Http\Requests\Api\Uuid\StoreUuidRequest  $request
     * @return \Dingo\Api\Http\ResponseBuilder
     */
    public function store(StoreUuidRequest $request)
    {
        $uuid = $this->uuidRepository->create(
            $request->only(['name', 'description'])
        );

        return $this->response()->created();
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
