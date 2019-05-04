<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function child(): HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }

    public function children()
    {
        return $this->child()->with('children');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }
}
