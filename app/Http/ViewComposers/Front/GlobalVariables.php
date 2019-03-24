<?php

use App\About;
use App\Album;
use App\Category;
use App\News;
use App\Notification;
use Illuminate\Database\Eloquent\Builder;

return [

    'latest_news' => Cache::remember('_footer_news', 1, function () {
        return News::with('categories:id,title')
            ->latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(function (Builder $news) {
                $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            })
            ->take(5)
            ->get(['id', 'title', 'summary', 'image', 'created_at']);
    }),

    'latest_notifications' => Cache::remember('_footer_notifications', 1, function () {
        return Notification::with('categories:id,title')
            ->latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(function (Builder $news) {
                $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            })
            ->take(5)
            ->get(['id', 'title', 'summary', 'image', 'created_at']);
    }),

    'latest_abouts' => Cache::remember('_footer_abouts', 1, function () {
        return About::orderBy('priority', 'DESC')->take(5)->get();
    }),

    'front_menu' => [
        [
            'title' => 'News',
            'link' => route('news.index'),
            'sub' => Category::where('category_type', News::class)->get()->map(function (Category $item) {
                return [
                    'title' => $item->title,
                    'link' => route('category.index', ['id' => $item->id, 'title' => $item->slug])
                ];
            })
        ]
    ]

];
