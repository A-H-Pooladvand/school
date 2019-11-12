<?php

namespace App\Http\Controllers\Slider\Admin;

use Auth;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index()
    {
        return view('slider.admin.index');
    }

    public function items(): array
    {
        return Slider::grid();
    }

    public function create()
    {
        $form = ['action' => route('admin.slider.store')];

        return view('slider.admin.form', compact('form'));
    }

    public function store(Request $request): array
    {
        $this->validate($request, $this->validator());

        $slider = Slider::create($this->fields($request));

        $this->tags($request->tags)->attach($slider);

        return ['message' => 'اسلایدر جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $slider = Slider::with('author')->findOrFail($id);

        return view('slider.admin.show', compact('slider'));
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        $form = [
            'action' => route('admin.slider.update', $slider['id']),
            'method' => 'put',
        ];

        //        return image_url($slider->image ?? '', 37,23,true);
        return view('slider.admin.form', compact('form', 'slider'));
    }

    public function update(Request $request, $id): array
    {
        #dd($request->all());

        $this->validate($request, $this->validator());

        $slider = Slider::findOrFail($id);

        $slider->update($this->fields($request, $slider));

        $this->tags($request->tags)->sync($slider);

        return ['message' => 'اسلایدر با موفقیت ویرایش شد.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        Slider::whereIn('id', $ids)->delete();
    }

    private function validator(): array
    {
        $rules = [
            'title'       => 'nullable|max:100',
            'description' => 'nullable|max:1000',
            'link'        => 'nullable|url|max:1000',
            'image'       => 'required',
        ];

        if (request()->method() === 'PUT') {
            $rules['image'] = 'nullable';
        }

        return $rules;
    }

    private function fields(Request $request, Slider $slider = null): array
    {
        return [
            'user_id'     => Auth::id(),
            'title'       => $request['title'],
            'description' => $request['description'] ?: '',
            'link'        => $request['link'] ?: '',
            'image'       => empty($request['image']) ? $slider['image'] : $request['image'],
        ];
    }
}
