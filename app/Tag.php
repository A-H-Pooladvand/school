<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $blogs
 */
class Tag extends Model
{
    protected $guarded = ['id'];

    /**
     * Get all of the news that are assigned this tag.
     */
    public function news()
    {
        return $this->morphedByMany(News::class, 'taggable');
    }

    /**
     * Get all of the notifications that are assigned this tag.
     */
    public function notifications()
    {
        return $this->morphedByMany(Notification::class, 'taggable');
    }
    /**
     * Get all of the notifications that are assigned this tag.
     */
    public function albums()
    {
        return $this->morphedByMany(Album::class, 'taggable');
    }

    public function pages()
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
