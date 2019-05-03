<?php

namespace App\Http\Controllers\Menu\Admin;

use App\Page;
use DB;
use Auth;
use App\Menu;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Category\JEasyUi;
use App\Http\Helpers\Multimedia\Multimedia;
use App\Http\Helpers\DateConverter\DateConverter;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu.admin.index');
    }

    public function items(Request $request)
    {
        $menu = Menu::select(['id', 'status', 'title', 'summary', 'created_at', 'updated_at']);

        $menu = $this->getGrid($request)->items($menu);
        $menu['rows'] = $menu['rows']->each(static function ($item) {
            $item->status_farsi = $item->status_fa;
            $item->created_at_farsi = $item->created_at_fa;
            $item->updated_at_farsi = $item->updated_at_fa;
        });

        return $menu;
    }

    public function create()
    {
        $form = ['action' => route('admin.menu.store')];

        $menus = Menu::get();

        $pagesID = $menus->where('page_id', '<>', null)->pluck('page_id');

        $pages = Page::whereNotIn('id', $pagesID)->get();

        return view('menu.admin.form', compact('form', 'menus', 'pages'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validator());

        $menus = [];

        foreach ($request['menus_title'] as $index => $title) {
            $menus[] = [
                'page_id' => $request['menus_id'][$index],
                'title' => $title,
                'priority' => $request['menus_priority'][$index],
                'link' => $request['menus_link'][$index],
            ];
        }

        if (! empty($request['pages_title'])) {
            foreach ($request['pages_title'] as $index => $title) {
                $menus[] = [
                    'page_id' => $request['pages_id'][$index],
                    'title' => $title,
                    'priority' => $request['pages_priority'][$index],
                    'link' => $request['pages_link'][$index],
                ];
            }
        }

        DB::transaction(static function () use ($menus) {
            Menu::truncate();
            Menu::insert($menus);
        });

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $menu = Menu::with('tags', 'user', 'author')->findOrFail($id);

        return view('menu.admin.show', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::with([
            'tags',
            'galleries',
            'categories',
            'files',
        ])->findOrFail($id);

        $form = [
            'action' => route('admin.menu.update', $menu['id']),
            'method' => 'put',
        ];

        $categories = Category::with('children')->where([
            'category_type' => Menu::class,
            'parent_id' => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        $category_ids = implode(',', $menu->categories->pluck('id')->toArray());

        return view('menu.admin.form', compact('menu', 'form', 'categories', 'category_ids'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request, $id) {

            $menu = Menu::find($id);

            $menu->update($this->fields($request, $menu));

            Multimedia::createOrUpdate($request, $menu->galleries(), 0);

            Multimedia::createOrUpdate($request, $menu->files(), 0, 'multimedia');

            $this->tags($request->tags)->sync($menu);

            $menu->categories()->sync($request->categories);
        });

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        Menu::whereIn('id', $ids)->delete();
    }

    // Methods

    private function validator(): array
    {
        $rules = [
            'pages_title.*' => 'required|max:40',
            'pages_priority.*' => 'required',
            'pages_link.*' => 'required|max:250',
            'menus_title.*' => 'required|max:40',
            'menus_priority.*' => 'required',
            'menus_link.*' => 'required|max:250',
        ];

        if (request()->method() === 'PUT') {
            $rules['image'] = 'nullable';
        }

        return $rules;
    }

    private function fields(Request $request, $menu = null): array
    {
        return [
            'title' => $request['title'],
            'priority' => $request['priority'],
            'link' => $request['link'],
        ];
    }
}