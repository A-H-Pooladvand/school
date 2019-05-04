<?php

namespace App\Http\Controllers\Menu\Admin;

use App\Page;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Category\JEasyUi;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu.admin.index');
    }

    public function items(Request $request)
    {
        $menu = Menu::select('id', 'title', 'priority', 'link');

        return $this->getGrid($request)->items($menu);
    }

    public function create()
    {
        $form = ['action' => route('admin.menu.store')];

        $menus = Menu::with('children')->whereNull('parent_id')->get()->toArray();

        $menus = JEasyUi::jsonFormat($menus);

        $pagesID = Menu::whereNotNull('page_id')->pluck('page_id');

        $pages = Page::whereNotIn('id', $pagesID)->get();

        return view('menu.admin.form', compact('form', 'menus', 'pages'));
    }

    public function store(Request $request): array
    {
        $this->validate($request, $this->validator());

        Menu::create($this->fields($request));

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $menu = Menu::with('children')->findOrFail($id);

        return view('menu.admin.show', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::with('children')->findOrFail($id);

        $form = [
            'action' => route('admin.menu.update', $menu['id']),
            'method' => 'put',
        ];

        $menus = Menu::with('children')->whereNull('parent_id')->get()->toArray();

        $menus = JEasyUi::jsonFormat($menus);

        $pages = Page::get();

        return view('menu.admin.form', compact('menu', 'form', 'menus', 'pages'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validator());
        $menu = Menu::find($id);
        $menu->update($this->fields($request, $menu));

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
            'title' => 'required|max:40',
            'priority' => 'required|max:250',
        ];

        return $rules;
    }

    private function fields(Request $request, Menu $menu = null): array
    {
        return [
            'title' => $request['title'],
            'parent_id' => (int) $request['parent'] === (empty($menu->id) ? null : $menu->id) ? null : $request['parent'],
            'priority' => $request['priority'],
            'link' => empty($request['link']) ? (empty($menu->link) ? null : $menu->id) : $request['link'],
            'page_id' => empty($request['page_id']) ? (empty($menu->page_id) ? null : $menu->id) : $request['page_id'],
        ];
    }
}
