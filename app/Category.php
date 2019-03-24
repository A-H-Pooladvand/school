<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 */
class Category extends Model
{
    protected $guarded = ['id'];

    public function news()
    {
        return $this->morphedByMany(News::class, 'categorizable', 'categorizables');
    }

    public function notifications()
    {
        return $this->morphedByMany(Notification::class, 'categorizable', 'categorizables');
    }

    public function albums()
    {
        return $this->morphedByMany(Album::class, 'categorizable', 'categorizables');
    }

    public function pages()
    {
        return $this->morphedByMany(Page::class, 'categorizable', 'categorizables');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->child()->with('children');
    }

    public function news_query()
    {
        return $this->news()
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(function (Builder $news) {
                $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            });
    }

    public function notification_query()
    {
        return $this->notifications()->latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(function (Builder $notification) {
                $notification->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            });
    }

    public function album_query()
    {
        return $this->albums()->latest();
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strFa($value);
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
