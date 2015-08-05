<?php namespace App\Repositories\Uuid;

use App\Traits\DateFormatTrait;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid as UuidFactory;

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

    /**
     * The "booting" method of the model.
     *
     * We'll use this method to register event listeners.
     *
     * Events:
     *
     * 1. "creating": Before creating a new UUID we'll add the generated UUID namespace.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // We generate a UUID v5 namespace using the name.
            // Casting it to a string creates a string using the toString()
            // method from Webpatser\Uuid\Uuid class.
            $model->setUuid(
                (string) UuidFactory::generate(5, $model->getName(), UuidFactory::NS_DNS)
            );
        });
    }

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * Set the name.
     *
     * @param  string  $name
     * @return $this
     */
    public function setName($name)
    {
        $this->setAttribute('name', $name);

        return $this;
    }

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * Set the description.
     *
     * @param  string  $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->setAttribute('description', $description);

        return $this;
    }

    /**
     * Get the UUID.
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->getAttribute('uuid');
    }

    /**
     * Set the UUID.
     *
     * @param  string  $uuid
     * @return $this
     */
    public function setUuid($uuid)
    {
        $this->setAttribute('uuid', $uuid);

        return $this;
    }
}
