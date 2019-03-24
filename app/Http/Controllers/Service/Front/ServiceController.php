<?php

namespace App\Http\Controllers\Service\Front;

use App\Http\Controllers\Controller;
use App\Service;
use Cache;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $this->seo()->setTitle('Service');
        $this->seo()->setDescription('SANIK GROUP latest service');

        $page = $request->has('page') ? $request->query('page') : 1;
        $service = Cache::remember("_front_service_index_{$page}", 1, function () {

            return Service::latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', Carbon::now())
                ->where(function (Builder $service) {
                    $service->whereNull('expire_at')->orWhere('expire_at', '>=', now());
                })->paginate(9, ["id", "title", "summary", "image", "created_at"]);
        });

        return view('service.front.index', compact('service'));
    }

    public function show($id)
    {
        $service = Service::with('tags', 'galleries', 'files')
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(function (Builder $service) {
                $service->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            })->find($id);

        $categories = $service->categories()->latest()->take(5)->get(['id', 'title']);

        $latestService = Service::latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', Carbon::now())
            ->where('expire_at', '>=', Carbon::now())
            ->where('id', '<>', $service->id)
            ->take(5)->get();

        $this->seo()->setTitle($service->title);
        $this->seo()->setDescription($service->description);

        return view('service.front.show', compact('service', 'latestService', 'categories'));
    }
}
