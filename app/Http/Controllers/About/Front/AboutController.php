<?php

namespace App\Http\Controllers\About\Front;

use App\About;
use Cache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /*public function index(Request $request)
    {
        $this->seo()->setTitle('About us');
        $this->seo()->setDescription('About us');

        $page = $request->has('page') ? $request->query('page') : 1;
        $about = Cache::remember("_front_news_index_{$page}", 1, function () {

            return About::latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', now())
                ->where(function (Builder $about) {
                    $about->whereNull('expire_at')->orWhere('expire_at', '>=', now());
                })->paginate(9, ["id", "title", "summary", "image", "created_at"]);
        });

        return view('news.front.index', compact('about'));
    }*/

    public function show($id)
    {
        $about = About::with('galleries', 'files')
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(function (Builder $about) {
                $about->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            })->find($id);

        $this->seo()->setTitle($about->title);
        $this->seo()->setDescription($about->description);

        return view('about.front.show', compact('about'));
    }
}
