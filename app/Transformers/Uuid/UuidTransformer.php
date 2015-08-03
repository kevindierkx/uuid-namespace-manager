<?php namespace App\Transformers\Uuid;

use League\Fractal\TransformerAbstract;
use App\Repositories\Uuid\UuidInterface;

class UuidTransformer extends TransformerAbstract
{
    /**
     * Turn item into generic array.
     *
     * @param  \App\Repositories\Uuid\UuidInterface  $uuid
     * @return array
     */
    public function transform(UuidInterface $uuid)
    {
        return [
            'id' => $uuid->id,
            'name' => $uuid->name,
            'description' => $uuid->description,
            'uuid' => $uuid->uuid,
            'created_at' => $uuid->created_at,
            'updated_at' => $uuid->updated_at,
        ];
    }
}
