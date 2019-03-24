<?php

namespace App\Http\Controllers\News\Front;

use App\Http\Controllers\Controller;
use App\News;
use Cache;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $this->seo()->setTitle('News');
        $this->seo()->setDescription('SANIK GROUP latest news');

        $page = $request->has('page') ? $request->query('page') : 1;
        $news = Cache::remember("_front_news_index_{$page}", 1, function () {

            return News::latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', Carbon::now())
                ->where(function (Builder $news) {
                    $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
                })->paginate(9, ["id", "title", "summary", "image", "created_at"]);
        });

        return view('news.front.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::with('tags', 'galleries', 'files')
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(function (Builder $news) {
                $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            })->find($id);

        $categories = $news->categories()->latest()->take(5)->get(['id', 'title']);

        $latestNews = News::latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', Carbon::now())
            ->where('expire_at', '>=', Carbon::now())
            ->where('id', '<>', $news->id)
            ->take(5)->get();

        $this->seo()->setTitle($news->title);
        $this->seo()->setDescription($news->description);

        return view('news.front.show', compact('news', 'latestNews', 'categories'));
    }
}
