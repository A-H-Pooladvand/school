<?php

namespace App\Http\Controllers\Page\Front;

use Cache;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->query('page') : 1;
        $page = Cache::remember("_front_page_index_{$page}", 1, static function () {
            return Page::latest()->paginate(9);
        });

        $this->seo()->setTitle('صفحات');
        $this->seo()->setDescription(array_first($page)['summary']);

        return view('page.front.index', compact('page'));
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        $this->seo()->setTitle($page->title);
        $this->seo()->setDescription($page->content);

        return view('page.front.show', compact('page'));
    }
}
