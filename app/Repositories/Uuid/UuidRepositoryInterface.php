<?php namespace App\Repositories\Uuid;

interface UuidRepositoryInterface
{
    /**
     * Query the UUIDs.
     *
     * @param  array  $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function query(array $query = []);
}
