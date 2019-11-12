<?php

namespace App\Models\Model\Traits;

trait Accessors
{
    /**
     * Converts created_at field to persian format.
     *
     * @return string|null
     */
    public function getCreatedAtFaAttribute(): ?string
    {
        return $this->toPersian('created_at');
    }

    /**
     * Converts updated_at field to persian format.
     *
     * @return string|null
     */
    public function getUpdatedAtFaAttribute(): ?string
    {
        return $this->toPersian('updated_at');
    }

    /**
     * Converts deleted_at field to persian format.
     *
     * @return string|null
     */
    public function getDeletedAtFaAttribute(): ?string
    {
        return null === $this->getAttribute('deleted_at') ? 'فعال' : 'غیرفعال';
    }

    /**
     * Converts publish_at field to persian format.
     *
     * @return string|null
     */
    public function getPublishAtFaAttribute(): ?string
    {
        return $this->toPersian('publish_at');
    }

    /**
     * Converts Expire_at field to persian format.
     *
     * @return string|null
     */
    public function getExpireAtFaAttribute(): ?string
    {
        return $this->toPersian('expire_at');
    }

    /**
     * Converts given carbon format to persian format.
     *
     * @param  string  $field
     * @return string|null
     */
    private function toPersian(string $field): ?string
    {
        $date = $this->getAttribute($field);

        return empty($date)
            ? null
            : jdate($this->getAttribute($field))->format('Y/m/d');
    }
}
