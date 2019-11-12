<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    protected $appends = [
        'created_at_fa',
        'updated_at_fa',
        'status_fa',
    ];

    protected $casts = [
        'has_comment' => 'boolean',
    ];

    public function getStatusFaAttribute(): ?string
    {
        return $this->status === 'publish' ? 'منتشر شده' : 'پیشنویس';
    }
}
