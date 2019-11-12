<?php

namespace App\Http\Controllers\_Controller\Grid;

use Illuminate\Database\Eloquent\Builder;

class Grid extends Filter
{
    /**
     * Determines value of requested page to paginate
     *
     * @var int
     */
    protected $page;

    /**
     * Determines how many rows should be taken for the query
     *
     * @var int
     */
    protected $rows;

    /**
     * Indicates the column which is requested for sorting
     *
     * @var string
     */
    protected $sort;

    /**
     * Indicates the ordering of column which is only ASC or DESC
     *
     * @var string
     */
    protected $order;

    /**
     * Determines total number of records which exists in database
     *
     * @var int
     */
    protected $total;

    /**
     * Prepare query for JEasyUi grid table
     *
     * @param  Builder|\Illuminate\Database\Query\Builder  $query
     *
     * @return array
     */
    public function items(Builder $query): array
    {
        $this->page = request('page');
        $this->rows = request('rows');
        $this->total = $query->count();

        $this->filter($query);
        $this->order($query);

        $query
            ->limit($this->rows)
            ->offset(($this->page - 1) * $this->rows);

        return [
            'total' => $this->total,
            'rows'  => $query->get(),
        ];
    }

    /**
     * If there is an order request from the client, we order
     * and return the ordered query to user otherwise we return the query
     *
     * @param  Builder  $query
     *
     * @return mixed
     */
    public function order(Builder $query)
    {
        $this->order = request('order') ?? 'desc';
        $this->sort = request('sort') ?? 'id';

        if (! empty($this->sort) && ! empty($this->order)) {
            return $query->orderBy($this->sort, $this->order);
        }

        return $query;
    }
}
