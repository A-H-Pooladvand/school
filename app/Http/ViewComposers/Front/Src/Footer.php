<?php

namespace App\Http\ViewComposers\Front\Src;

use Cache;
use App\News;
use App\Link;
use App\Setting;
use App\Notification;
use Illuminate\Database\Eloquent\Builder;

class Footer
{
    public function get(): array
    {
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

            'setting' => Cache::remember('_footer_settings_', 1, static function () {
                return Setting::first();
            }),

            'links' => Cache::remember('_footer_links_', 1, static function () {
                return Link::latest()->take(5)->get();
            }),

        ];
    }
}