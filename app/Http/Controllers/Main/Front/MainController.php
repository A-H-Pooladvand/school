<?php

namespace App\Http\Controllers\Main\Front;

use Cache;
use App\News;
use App\Album;
use App\Slider;
use App\Service;
use App\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class MainController extends Controller
{
    public function show()
    {
        $this->seo()->setDescription('طرحی نو اندیشه ای نو در هنرستان انفورماتیک مائده به هدف رسیدن نیازمند روش است.');

        $sliders = Cache::remember('_front_sliders_', 1, function () {
            return Slider::latest()->take(5)->get(['title', 'image', 'description', 'link']);
        });

        $news = Cache::remember('_front_news_', 1, function () {
            return News::with('categories:id,title')
                ->latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', now())
                ->where(function (Builder $news) {
                    return $news->whereNull('expire_at')->orWhere('expire_at', '>=', now());
                })
                ->take(3)
                ->get(['id', 'title', 'summary', 'image', 'created_at']);
        });

        $notifications = Cache::remember('_front_notifications_', 1, function () {
            return Notification::with('categories:id,title')
                ->latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', now())
                ->where(function (Builder $notification) {
                    return $notification->whereNull('expire_at')->orWhere('expire_at', '>=', now());
                })->take(3)->get(['id', 'title', 'summary', 'image', 'created_at']);
        });

        $services = Cache::remember('_front_services_', 1, function () {
            return Service::with('categories:id,title')
                ->latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', now())
                ->where(function (Builder $service) {
                    return $service->whereNull('expire_at')->orWhere('expire_at', '>=', now());
                })->take(3)->get(['id', 'title', 'summary', 'image', 'created_at']);
        });

        $albums = Cache::remember('_front_albums', 1, function () {
            return Album::latest()->take(6)->get();
        });

        return view('main.front.index', compact('sliders', 'news', 'notifications', 'services', 'albums'));
    }
}
