<?php

use App\News;
use App\Notification;
use Illuminate\Database\Eloquent\Builder;

return [

    'latest_news' => Cache::remember('_footer_news', 1, static function () {
        return News::with('categories:id,title')
            ->latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(static function (Builder $news) {
                $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            })
            ->take(5)
            ->get(['id', 'title', 'summary', 'image', 'created_at']);
    }),

    'latest_notifications' => Cache::remember('_footer_notifications', 1, static function () {
        return Notification::with('categories:id,title')
            ->latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(static function (Builder $news) {
                $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            })
            ->take(5)
            ->get(['id', 'title', 'summary', 'image', 'created_at']);
    }),

    'setting' => Cache::remember('_footer_settings', 1, static function () {
        return \App\Setting::first();
    }),

];
