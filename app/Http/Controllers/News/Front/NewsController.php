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
        $page = $request->has('page') ? $request->query('page') : 1;
        $news = Cache::remember("_front_news_index_{$page}", 1, static function () {

            return News::latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', Carbon::now())
                ->where(static function (Builder $news) {
                    $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
                })->paginate(9, ['id', 'title', 'summary', 'image', 'created_at']);
        });

        $this->seo()->setTitle('اخبار');
        $this->seo()->setDescription(array_first($news)['summary']);

        return view('news.front.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::with('tags', 'galleries', 'files')
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(static function (Builder $news) {
                $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            })->find($id);

        $categories = $news->categories()->latest()->take(5)->get(['id', 'title']);

        $relatedNews = News::latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', Carbon::now())
            ->where('expire_at', '>=', Carbon::now())
            ->where('id', '<>', $news->id)
            ->take(5)->get();

        $this->seo()->setTitle($news->title);
        $this->seo()->setDescription($news->content);

        return view('news.front.show', compact('news', 'relatedNews', 'categories'));
    }
}
