<?php namespace App\Repositories\Uuid;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateFormatTrait;

class Uuid extends Model implements UuidInterface
{
    use DateFormatTrait;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'uuid';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'uuid_namespaces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];
}
