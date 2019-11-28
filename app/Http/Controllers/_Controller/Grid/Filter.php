<?php

namespace App\Http\Controllers\_Controller\Grid;

use Illuminate\Database\Eloquent\Builder;

class Filter
{
    /**
     * Indicates the field, operator and value of requested row of search
     *
     * @var array
     */
    protected $filter;

    protected function filter(Builder $query)
    {
        $this->filter = json_decode(request('filterRules'), true);

        if (! request()->has('filterRules')) {
            return $query;
        }

        foreach ($this->filter as $field => $item) {
            if (preg_match('/_fa$/m', $item['field'])) {
                $item['field'] = str_replace('_fa', '', $item['field']);
            }

            switch ($item['op']) {
                case 'contains':
                    $query->where($item['field'], 'LIKE', "%{$item['value']}%");
                    break;
                case 'equal':
                    //                    $query->where($item['field'], $item['value']);
                    $query->where($item['field'], 'LIKE', "%{$item['value']}%");
                    break;
                case 'notequal':
                    $query->where($item['field'], '<>', $item['value']);
                    break;
                case 'less':
                    $query->where($item['field'], '<', $item['value']);
                    break;
                case 'lessorequal':
                    $query->where($item['field'], '<=', $item['value']);
                    break;
                case 'greater':
                    $query->where($item['field'], '>', $item['value']);
                    break;
                case 'greaterorequal':
                    $query->where($item['field'], '>=', $item['value']);
                    break;
            }
        }

        return $query;
    }
}
