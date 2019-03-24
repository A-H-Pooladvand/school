<?php

namespace App\Http\Controllers\Service\Admin;

use DB;
use Auth;
use App\Service;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Category\JEasyUi;
use App\Http\Helpers\Multimedia\Multimedia;
use App\Http\Helpers\DateConverter\DateConverter;

class ServiceController extends Controller
{
    public function index()
    {
        return view('service.admin.index');
    }

    public function items(Request $request)
    {
        $service = Service::select(['id', 'status', 'title', 'summary', 'created_at', 'updated_at']);

        $service = $this->getGrid($request)->items($service);
        $service['rows'] = $service['rows']->each(function ($item) {
            $item->status_farsi = $item->status_fa;
            $item->created_at_farsi = $item->created_at_fa;
            $item->updated_at_farsi = $item->updated_at_fa;
        });
        return $service;
    }

    public function create()
    {
        $form = ['action' => route('admin.service.store')];

        $categories = Category::with('children')->where([
            'category_type' => Service::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        return view('service.admin.form', compact('form', 'categories'));
    }

    public function store(Request $request)
    {
        $this->convertDates($request);

        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request) {

            $service = Service::create($this->fields($request));

            Multimedia::createOrUpdate($request, $service->galleries(), 0);

            Multimedia::createOrUpdate($request, $service->files(), 0, 'multimedia');

            $service->categories()->attach($request->categories);

            $this->tags($request->tags)->attach($service);

        });

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $service = Service::with('tags', 'user', 'author')->findOrFail($id);

        return view('service.admin.show', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::with([
            'tags',
            'galleries',
            'categories',
            'files'
        ])->findOrFail($id);

        $form = [
            'action' => route('admin.service.update', $service['id']),
            'method' => 'put'
        ];

        $categories = Category::with('children')->where([
            'category_type' => Service::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        $category_ids = implode(',', $service->categories->pluck('id')->toArray());

        return view('service.admin.form', compact('service', 'form', 'categories', 'category_ids'));
    }

    public function update(Request $request, $id)
    {
        $this->convertDates($request);

        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request, $id) {

            $service = Service::find($id);

            $service->update($this->fields($request, $service));

            Multimedia::createOrUpdate($request, $service->galleries(), 0);

            Multimedia::createOrUpdate($request, $service->files(), 0, 'multimedia');

            $this->tags($request->tags)->sync($service);

            $service->categories()->sync($request->categories);

        });

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        Service::whereIn('id', $ids)->delete();
    }

    // Methods

    private function validator()
    {
        $rules = [
            'title' => 'required|max:100',
            'image' => 'required',
            'summary' => 'required|max:250',
            'content' => 'required',
            'publish_at' => 'required',
            'categories' => 'required',
        ];


        if (request()->method() === 'PUT')
            $rules['image'] = 'nullable';

        return $rules;
    }

    private function fields(Request $request, $service = null)
    {
        return [
            'user_id' => Auth::id(),
            'title' => $request['title'],
            'summary' => $request['summary'],
            'content' => $request['content'],
            'image' => empty($request['image']) ? $service['image'] : $request['image'],
            'publish_at' => $request['publish_at'],
            'expire_at' => $request['expire_at'],
            'status' => $request['status'],
        ];
    }

    private function convertDates(Request $request)
    {
        if(!empty($request->expire_at))
            $request->merge(['expire_at' => DateConverter::toGregorian($request['expire_at'])]);

        if(!empty($request->publish_at))
            $request->merge(['publish_at' => DateConverter::toGregorian($request['publish_at'])]);

//        if ( ! empty($request->expire_at))
//            $request->merge(['expire_at' => DateConverter::toGregorian($request['expire_at'])]);
//
//        $request->merge(['publish_at' => DateConverter::toGregorian($request['publish_at'])]);
    }

}
