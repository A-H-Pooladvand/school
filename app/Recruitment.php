<?php

namespace App;

class Recruitment extends Model
{
    protected $appends = [
        'collaboration_type_fa',
        'created_at_fa'
    ];

    protected $table = 'recruitment';

    /**
     * Converts collaboration_type to persian.
     *
     * @return string|null
     */
    public function getCollaborationTypeFaAttribute(): ?string
    {
        switch ($this->collaboration_type) {
            case 'part_time':
                return 'پاره وقت';
            case 'full_time':
                return 'تمام وقت';
            case 'teleworking':
                return 'دورکاری';
            default:
                return 'نامشخص';
        }
    }
}
