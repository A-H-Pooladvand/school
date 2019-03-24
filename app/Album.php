<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get all of the album's galleries.
     */
    public function galleries()
    {
        return $this->morphMany(Gallery::class, 'gallery');
    }

    /**
     * Get all of the categories for the exam.
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable', 'categorizables');
    }

    /**
     * Owner of post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCreatedAtAttribute()
    {
        return jdate($this->attributes['created_at'])->format('Y/m/d');
    }

    public function getUpdatedAtAttribute()
    {
        return jdate($this->attributes['updated_at'])->format('Y/m/d');
    }
}
