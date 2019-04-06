<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $guarded = [
      'id'
    ];

    /**
     * Mutator section
     *
     * Convert fields to persian and human readable format
     */
    public function getCreatedAtFaAttribute()
    {
        return jdate($this->attributes['created_at'])->format('Y/m/d');
    }

    public function getUpdatedAtFaAttribute()
    {
        return jdate($this->attributes['updated_at'])->format('Y/m/d');
    }
}