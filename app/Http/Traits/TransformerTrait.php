<?php namespace App\Http\Traits;

trait TransformerTrait
{
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
}
