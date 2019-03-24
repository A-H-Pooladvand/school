<?php

namespace App\Http\Controllers\About\Admin;

use DB;
use Auth;
use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Multimedia\Multimedia;
use App\Http\Helpers\DateConverter\DateConverter;

class AboutController extends Controller
{
    protected $form = [];

    public function index()
    {
        $this->form = ['action' => route('admin.about.items'), 'link' => route('admin.about.index')];

        return view('about.admin.index', ['form' => $this->form]);
    }

    public function items(Request $request)
    {
        $abouts = About::select(['id', 'status', 'title', 'summary', 'created_at', 'updated_at']);

        $abouts = $this->getGrid($request)->items($abouts);
        $abouts['rows'] = $abouts['rows']->each(function (About $about) {
            $about->status_farsi = $about->status_fa;
            $about->created_at_farsi = $about->created_at_fa;
            $about->updated_at_farsi = $about->updated_at_fa;

        });

        return $abouts;
    }

    public function create()
    {
        $this->form = ['action' => route('admin.about.store')];

        return view('about.admin.form', ['form' => $this->form]);
    }

    public function store(Request $request)
    {
        $this->convertDates($request);

        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request) {

            $about = About::create($this->fields($request));

            Multimedia::createOrUpdate($request, $about->galleries(), 0);

//            Multimedia::createOrUpdate($request, $about->files(), 0, 'multimedia');

        });

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $about = About::with('tags', 'author')->findOrFail($id);

        return view('about.admin.show', compact('about'));
    }

    public function edit($id)
    {
        $about = About::with([
            'galleries',
            'files'
        ])->findOrFail($id);

        $this->form = ['action' => route('admin.about.update', $about['id']), 'method' => 'put'];

        return view('about.admin.form', ['about' => $about, 'form' => $this->form]);
    }

    public function update(Request $request, $id)
    {
        $this->convertDates($request);

        $this->validate($request, $this->validator());

        DB::transaction(function () use ($request, $id) {

            $about = About::find($id);

            $about->update($this->fields($request, $about));

            Multimedia::createOrUpdate($request, $about->galleries(), 0);

//            Multimedia::createOrUpdate($request, $about->files(), 0, 'multimedia');

        });

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        About::whereIn('id', $ids)->delete();
    }

    // Methods

    private function validator()
    {
        $rules = [
            'title' => 'required|max:100',
            'summary' => 'required|max:250',
            'content' => 'required',
            'publish_at' => 'required',
            'priority' => 'required|max:255|integer'
        ];

        return $rules;
    }

    private function fields(Request $request, About $about = null)
    {
        $image = null;

        if ($request['check_img'] === "exist") {
            if (empty($request['image'])) {
                $image = $about->image;
            } else {
                $image = $request['image'];
            }
        }

        return [
            'user_id' => Auth::id(),
            'title' => $request['title'],
            'summary' => $request['summary'],
            'content' => $request['content'],
            'image' => $image,
            'publish_at' => $request['publish_at'],
            'expire_at' => $request['expire_at'],
            'status' => $request['status'],
            'priority' => $request['priority'],
        ];
    }

    private function convertDates(Request $request)
    {
        if ( ! empty($request->expire_at)) {
            $request->merge(['expire_at' => DateConverter::toGregorian($request['expire_at'])]);
        }

        $request->merge(['publish_at' => DateConverter::toGregorian($request['publish_at'])]);
    }
}
