<?php namespace App\Repositories\Uuid;

interface UuidInterface
{
    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set the name.
     *
     * @param  string  $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set the description.
     *
     * @param  string  $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * Get the UUID.
     *
     * @return string
     */
    public function getUuid();

    /**
     * Set the UUID.
     *
     * @param  string  $uuid
     * @return $this
     */
    public function setUuid($uuid);
}
