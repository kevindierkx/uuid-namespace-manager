<?php namespace App\Repositories\Uuid;

use App\Traits\EventTrait;
use App\Traits\RepositoryTrait;
use Illuminate\Contracts\Events\Dispatcher;

class UuidRepository implements UuidRepositoryInterface
{
    use EventTrait;
    use RepositoryTrait;

    /**
     * @var \Illuminate\Contracts\Events\Dispatcher
     */
    protected $dispatcher;

    /**
     * @var string
     */
    protected $model = 'App\Repositories\Uuid\Uuid';

    /**
     * Bind instances to the class.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * Query the UUIDs.
     *
     * @param  array  $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function query(array $query = [])
    {
        return $this->createModel()
            ->where($query)
            ->get();
    }

    /**
     * Create UUID.
     *
     * @param  array  $data
     * @return \App\Repositories\Uuid\UuidInterface
     */
    public function create(array $data)
    {
        $uuid = $this->createModel();

        $this->fireEvent('uuid.creating', compact('uuid', 'data'));

        $uuid->fill($data);

        $uuid->save();

        $this->fireEvent('uuid.created', compact('uuid', 'data'));

        return $uuid;
    }

    /**
     * Returns the model.
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Runtime override of the model.
     *
     * @param  string  $model
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Returns the event dispatcher.
     *
     * @return \Illuminate\Contracts\Events\Dispatcher
     */
    public function getDispatcher()
    {
        return $this->dispatcher;
    }

    /**
     * Sets the event dispatcher instance.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $dispatcher
     * @return $this
     */
    public function setDispatcher(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;

        return $this;
    }
}
