<?php namespace App\Traits;

trait RepositoryTrait
{
    /**
     * Returns the model.
     *
     * @return string
     */
    abstract public function getModel();

    /**
     * Runtime override of the model.
     *
     * @param  string  $model
     * @return $this
     */
    abstract public function setModel($model);

    /**
     * Create a new instance of the model.
     *
     * @param  array  $attributes
     * @return mixed
     */
    public function createModel(array $attributes = [])
    {
        $model = '\\'.ltrim($this->getModel(), '\\');

        return new $model($attributes);
    }

    /**
     * Dynamically pass missing methods to the model.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $model = $this->createModel();

        return call_user_func_array([$model, $method], $parameters);
    }
}
