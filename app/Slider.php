<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slider extends Model
{
    protected $appends = [
        'created_at_fa',
        'updated_at_fa',
    ];
}
