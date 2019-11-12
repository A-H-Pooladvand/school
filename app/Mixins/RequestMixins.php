<?php

namespace App\Mixins;

class RequestMixins
{
    /**
     * Returns only filled inputs.
     *
     * @return callable
     */
    public function filledOnly(): callable
    {
        return static function ($keys = null): array {
            $keys = null === $keys
                ? request()->all()
                : request()->only($keys);

            return array_filter($keys);
        };
    }
}
