<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property mixed $id
 */
class Category extends Model
{
    protected $guarded = ['id'];

    public function news(): MorphToMany
    {
        return $this->morphedByMany(News::class, 'categorizable', 'categorizables');
    }

    public function service(): MorphToMany
    {
        return $this->morphedByMany(Service::class, 'categorizable', 'categorizables');
    }

    public function notifications(): MorphToMany
    {
        return $this->morphedByMany(Notification::class, 'categorizable', 'categorizables');
    }

    public function albums(): MorphToMany
    {
        return $this->morphedByMany(Album::class, 'categorizable', 'categorizables');
    }

    public function pages(): MorphToMany
    {
        return $this->morphedByMany(Page::class, 'categorizable', 'categorizables');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    public function child(): HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_id');
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
            ->where(static function (Builder $news) {
                return $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            });
    }

    public function notification_query()
    {
        return $this->notifications()->latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(static function (Builder $notification) {
                return $notification->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            });
    }

    public function album_query()
    {
        return $this->albums()->latest();
    }

    public function service_query()
    {
        return $this->service()->latest();
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
