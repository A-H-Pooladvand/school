<?php

namespace App\Http\Controllers\Notification\Admin;

use DB;
use Auth;
use App\Category;
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Category\JEasyUi;
use App\Http\Helpers\Multimedia\Multimedia;
use App\Http\Helpers\DateConverter\DateConverter;

class NotificationController extends Controller
{
    public function index()
    {
        return view('notification.admin.index');
    }

    public function items(): array
    {
        return Notification::grid();
    }

    public function create()
    {
        $form = ['action' => route('admin.notification.store')];

        $categories = Notification::treeCategories();

        return view('notification.admin.form', compact('form', 'categories'));
    }

    public function store(Request $request): array
    {
        $this->convertDates($request);

        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request) {
            $notification = Notification::create($this->fields($request));

            Multimedia::createOrUpdate($request, $notification->galleries(), 0);

            $notification->categories()->attach($request->categories);

            $this->tags($request->tags)->attach($notification);
        });

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $notification = Notification::with('tags', 'user', 'author')->findOrFail($id);

        return view('notification.admin.show', compact('notification'));
    }

    public function edit($id)
    {
        $notification = Notification::with([
            'tags',
            'galleries',
            'categories',
        ])->findOrFail($id);

        $form = [
            'action' => route('admin.notification.update', $notification['id']),
            'method' => 'put',
        ];

        $categories = Category::with('children')->where([
            'category_type' => Notification::class,
            'parent_id'     => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        $category_ids = implode(',', $notification->categories->pluck('id')->toArray());

        return view('notification.admin.form', compact('notification', 'form', 'categories', 'category_ids'));
    }

    public function update(Request $request, $id): array
    {
        $this->convertDates($request);

        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request, $id) {
            $notification = Notification::find($id);

            $notification->update($this->fields($request, $notification));

            Multimedia::createOrUpdate($request, $notification->galleries(), 0);

            $this->tags($request->tags)->sync($notification);

            $notification->categories()->sync($request->categories);
        });

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function destroy($id): void
    {
        $ids = explode(',', $id);

        Notification::whereIn('id', $ids)->delete();
    }

    // Methods

    private function validator(): array
    {
        $rules = [
            'title'      => 'required|max:100',
            'image'      => 'required',
            'summary'    => 'required|max:250',
            'content'    => 'required',
            'publish_at' => 'required',
            'categories' => 'required',
        ];

        if (request()->method() === 'PUT') {
            $rules['image'] = 'nullable';
        }

        return $rules;
    }

    private function fields(Request $request, $notification = null): array
    {
        return [
            'user_id'    => Auth::id(),
            'title'      => $request['title'],
            'summary'    => $request['summary'],
            'content'    => $request['content'],
            'image'      => $request->filled('image') ? $request['image'] : $notification['image'],
            'publish_at' => $request['publish_at'],
            'expire_at'  => $request['expire_at'],
            'status'     => $request['status'],
            'priority'   => $request->filled('priority') ? $request['priority'] : 1,
        ];
    }

    private function convertDates(Request $request): void
    {
        if (! empty($request->expire_at)) {
            $request->merge(['expire_at' => DateConverter::toGregorian($request['expire_at'])]);
        }

        if (! empty($request->publish_at)) {
            $request->merge(['publish_at' => DateConverter::toGregorian($request['publish_at'])]);
        }
    }
}
