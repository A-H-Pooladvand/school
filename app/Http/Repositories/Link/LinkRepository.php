<?php

namespace App\Http\Repositories\Link;

use Auth;
use App\Link;
use Illuminate\Http\Request;

class LinkRepository
{
    /**
     * Link model
     *
     * @var \App\Link
     */
    private $link;

    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    /**
     * Create a new link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array|null  $items
     * @return \App\Link
     */
    public function create(Request $request, array $items = null): Link
    {
        $request->merge(['user_id' => Auth::id()]);

        return $this->link::create(
            $items ?? $request->only([
                'title',
                'link',
                'priority',
                'user_id',
            ])
        );
    }

    /**
     * Updates given link.
     *
     * @param  \App\Link  $link
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $items
     * @return \App\Link
     */
    public function update(Link $link, Request $request, array $items = []): Link
    {
        $link->update(
            $items ?? $request->only([
                'title',
                'link',
                'priority',
                'user_id',
            ])
        );

        return $link;
    }

    /**
     * Find a link by id.
     *
     * @param $id
     * @return \App\Link
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findById($id): Link
    {
        return $this->link::findOrFail($id);
    }

    /**
     * Delete multiple links by given ids.
     *
     * @param $id
     * @return int
     */
    public function delete($id): int
    {
        $ids = explode(',', $id);

        return $this->link::whereIn('id', $ids)->delete();
    }
}