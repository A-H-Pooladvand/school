<?php

namespace App\Http\Controllers\Page\Admin;

use DB;
use Auth;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Multimedia\Multimedia;

class PageController extends Controller
{
    public function index()
    {
        return view('page.admin.index');
    }

    public function create()
    {
        $form = ['action' => route('admin.page.store')];

        return view('page.admin.form', compact('form'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request) {
            $page = Page::create($this->fields($request));

            Multimedia::createOrUpdate($request, $page->galleries(), 0);

            $this->tags($request['tags'])->attach($page);
        });

        return ['message' => 'صفحه جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $page = Page::with('tags', 'user')->findOrFail($id);

        return view('page.admin.show', compact('page'));
    }

    public function edit($id)
    {
        $page = Page::with('tags', 'galleries')->findOrFail($id);

        $form = [
            'action' => route('admin.page.update', $page['id']),
            'method' => 'put',
        ];

        return view('page.admin.form', compact('page', 'form'));
    }

    public function update(Request $request, $id): array
    {
        $this->validate($request, $this->validator());

        $page = Page::findOrFail($id);

        DB::transaction(function () use ($request, $page) {
            $page->update($this->fields($request, $page));

            Multimedia::createOrUpdate($request, $page->galleries(), 0);

            $this->tags($request['tags'])->sync($page);
        });

        return ['message' => 'صفحه جدید با موفقیت ثبت شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        Page::whereIn('id', $ids)->delete();
    }

    /**
     * Validate rules.
     *
     * @return array
     */
    private function validator(): array
    {
        $rules = [
            'title' => 'required|max:100',
            'slug' => 'required|max:100',
            'content' => 'required',
            //'gallery_type' => 'required',
        ];

        if (request()->method() === 'POST') {
            $rules['image'] = 'required';
        }

        return $rules;
    }

    private function fields(Request $request, Page $page = null): array
    {
        return [
            'user_id' => Auth::id(),
            'title' => $request['title'],
            'slug' => $request['slug'],
            'content' => $request['content'],
            //'gallery_type' => $request['gallery_type'],
            'image' => $request['image'] ?? $page['image'],
        ];
    }
}
