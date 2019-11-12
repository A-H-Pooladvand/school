<?php

namespace App\Http\Helpers\Category;

use Illuminate\Support\Collection;

class JEasyUi
{
    /**
     * Converts given categories to JEasyUI format.
     *
     * @param  iterable  $items
     * @param  string|null  $text
     * @param  string|null  $alt
     * @param  string  $relationKey
     * @return array
     */
    public static function jsonFormat(iterable $items, string $text = null, string $relationKey = null, string $alt = null): array
    {
        $relationKey = $relationKey ?? 'children';
        $text = $text ?? 'title';

        if ($items instanceof Collection) {
            $items = $items->toArray();
        }

        return array_map(static function ($item) use ($relationKey, $text, $alt) {

            if (! array_key_exists($text, $item)) {
                $text = $alt;
            }

            $items = [
                'id' => $item['id'],
                'text' => $item[$text],
                //'state' => empty($category[$key']) ? 'open' : 'closed',
                'state' => 'open',
            ];

            if (array_key_exists($relationKey, $item) && is_array($item[$relationKey])) {
                $items['children'] = self::jsonFormat($item[$relationKey], $text, $relationKey, $alt);
            }

            return $items;
        }, $items);
    }
}
