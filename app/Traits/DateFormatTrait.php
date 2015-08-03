<?php namespace App\Traits;

trait DateFormatTrait
{
   /**
     * Return created_at as ISO8601.
     *
     * @param  mixed  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return $this->asDateTime($value)->toISO8601String();
    }

    /**
     * Return updated_at as ISO8601.
     *
     * @param  mixed  $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return $this->asDateTime($value)->toISO8601String();
    }
}
