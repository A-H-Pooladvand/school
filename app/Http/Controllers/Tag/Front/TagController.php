<?php

namespace App\Http\Controllers\Tag\Front;

use App\News;
use App\Tag;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class TagController extends Controller
{
    public function index($slug)
    {
        $tag = Tag::where('slug', $slug)->first();

        $this->seo()->setTitle($tag->title);
        $this->seo()->setDescription($tag->title);

        $news = $tag->news()
            ->where('status', 'publish')
            ->where('publish_at', '<=', Carbon::now())
            ->where(function (Builder $news) {
                $news->whereNull('expire_at')
                    ->orWhere('expire_at', '>=', now());
            })->get(["id", "title", "summary", "image", "created_at"]);

        $notifications = $tag->notifications()
            ->where('status', 'publish')
            ->where('publish_at', '<=', Carbon::now())
            ->where(function (Builder $notification) {
                $notification->whereNull('expire_at')
                    ->orWhere('expire_at', '>=', now());
            })->get(["id", "title", "summary", "image", "created_at"]);

        $albums = $tag->albums()->get();

        return view('tag.front.index', compact('tag', 'news', 'notifications', 'albums'));
    }
}
