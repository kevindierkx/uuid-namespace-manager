<?php namespace App\Traits;

trait TransformerTrait
{
    /**
     * Returns the transformer.
     *
     * @return string
     */
    abstract public function getTransformer();

    /**
     * Runtime override of the transformer.
     *
     * @param  string  $transformer
     * @return $this
     */
    abstract public function setTransformer($transformer);

    /**
     * Create a new instance of the transformer.
     *
     * @return mixed
     */
    public function createTransformer()
    {
        $transformer = '\\'.ltrim($this->getTransformer(), '\\');

        return new $transformer;
    }
}
