<?php

namespace App\Http\Controllers\Notification\Front;

use Cache;
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->query('page') : 1;
        $notifications = Cache::remember("_front_notification_index_{$page}", 1, function () {
            return Notification::latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', now())
                ->where(function (Builder $notification) {
                    return $notification->whereNull('expire_at')->orWhere('expire_at', '>=', now());
                })->paginate(10, ["id", "title", "summary", "image", "created_at"]);
        });

        $this->seo()->setTitle('اطلاعیه ها');
        $this->seo()->setDescription(array_first($notifications)['summary']);

        return view('notification.front.index', compact('notifications'));
    }

    public function show($id)
    {
        $notification = Notification::with('tags', 'galleries'/*, 'files'*/)
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(function (Builder $notification) {
                $notification->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            })->find($id);

        $categories = $notification->categories()->latest()->take(5)->get(['id', 'title']);

        $relatedNotifications = Notification::latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where('expire_at', '>=', now())
            ->where('id', '<>', $notification->id)
            ->take(3)->get();

        $this->seo()->setTitle($notification->title);
        $this->seo()->setDescription($notification->description);

        return view('notification.front.show', compact('notification', 'relatedNotifications', 'categories'));
    }
}
