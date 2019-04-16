<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property mixed $blogs
 */
class Tag extends Model
{
    protected $guarded = ['id'];

    /**
     * Get all of the news that are assigned this tag.
     */
    public function news(): MorphToMany
    {
        return $this->morphedByMany(News::class, 'taggable');
    }

    /**
     * Get all of the notifications that are assigned this tag.
     */
    public function notifications(): MorphToMany
    {
        return $this->morphedByMany(Notification::class, 'taggable');
    }
    /**
     * Get all of the notifications that are assigned this tag.
     */
    public function albums(): MorphToMany
    {
        return $this->morphedByMany(Album::class, 'taggable');
    }

    public function pages(): MorphToMany
    {
        return $this->morphedByMany(Page::class, 'taggable');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strFa($value);
        $this->attributes['slug'] = str_slug_fa(strFa($value));
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
