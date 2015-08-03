<?php namespace App\Repositories\Uuid;

use App\Traits\RepositoryTrait;

class UuidRepository implements UuidRepositoryInterface
{
    use RepositoryTrait;

    /**
     * @var string
     */
    protected $model = 'App\Repositories\Uuid\Uuid';

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
}
