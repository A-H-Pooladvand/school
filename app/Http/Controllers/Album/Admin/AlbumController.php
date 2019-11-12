<?php

namespace App\Http\Controllers\Album\Admin;

use DB;
use App\Album;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Category\JEasyUi;
use App\Http\Helpers\Multimedia\Multimedia;
use App\Http\QueryObjects\Album\Admin\AlbumAdminQuery;

class AlbumController extends Controller
{
    private $albumQuery;

    public function __construct(AlbumAdminQuery $albumQuery)
    {
        parent::__construct();

        $this->albumQuery = $albumQuery;
    }

    public function index()
    {
        return view('album.admin.index');
    }

    public function items(): array
    {
        return Album::grid();
    }

    public function create()
    {
        $form = ['action' => route('admin.album.store')];

        $categories = Album::treeCategories();

        return view('album.admin.form', compact('form', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->albumQuery->validate());

        DB::transaction(function () use ($request) {
            $album = Album::create($this->albumQuery->fields());

            Multimedia::createOrUpdate($request, $album->galleries(), 0);

            $album->categories()->attach($request->categories);
        });

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $album = Album::with('user', 'user')->findOrFail($id);

        return view('album.admin.show', compact('album'));
    }

    public function edit($id)
    {
        $album = Album::with(['galleries', 'categories',])->findOrFail($id);

        $form = [
            'action' => route('admin.album.update', $album['id']),
            'method' => 'put',
        ];

        $categories = Category::with('children')->where([
            'category_type' => Album::class,
            'parent_id'     => null,
        ])->get()->toArray();

        $categories = JEasyUi::jsonFormat($categories);

        $category_ids = implode(',', $album->categories->pluck('id')->toArray());

        return view('album.admin.form', compact('album', 'form', 'categories', 'category_ids'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->albumQuery->validate());

        DB::transaction(function () use ($request, $id) {
            $album = Album::find($id);

            $album->update($this->albumQuery->fields($album));

            Multimedia::createOrUpdate($request, $album->galleries(), 0);

            $album->categories()->sync($request->categories);
        });

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        Album::whereIn('id', $ids)->delete();
    }
}
