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
        $page = $request->has('page') ? $request->query('page') : 1;
        $services = Cache::remember("_front_services_index_{$page}", 1, static function () {

            return Service::latest()
                ->where('status', 'publish')
                ->where('publish_at', '<=', Carbon::now())
                ->where(static function (Builder $service) {
                    $service->whereNull('expire_at')->orWhere('expire_at', '>=', now());
                })->paginate(9, ['id', 'title', 'summary', 'image', 'created_at']);
        });

        $this->seo()->setTitle('رشته ها');
        $this->seo()->setDescription($services[0]['summary']);

        return view('service.front.index', compact('services'));
    }

    public function show($id)
    {
        $service = Service::with('tags', 'files', 'categories')
            ->where('status', 'publish')
            ->where('publish_at', '<=', now())
            ->where(static function (Builder $service) {
                $service->whereNull('expire_at')->orWhere('expire_at', '>=', now());
            })->find($id);

        $categories = $service->categories()->latest()->take(5)->get(['id', 'title']);

        $relatedServices = Service::latest()
            ->where('status', 'publish')
            ->where('publish_at', '<=', Carbon::now())
            ->where('expire_at', '>=', Carbon::now())
            ->where('id', '<>', $service->id)
            ->take(3)->get();

        $this->seo()->setTitle($service->title);
        $this->seo()->setDescription($service->description);

        return view('service.front.show', compact('service', 'relatedServices', 'categories'));
    }
}
