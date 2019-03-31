<?php

namespace App\Http\Controllers\About\Admin;

use Auth;
use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    protected $form = [];

    public function edit()
    {
        $about = About::first();

        $this->form = ['action' => route('admin.about.update'), 'method' => 'put'];

        return view('about.admin.form', ['about' => $about, 'form' => $this->form]);
    }

    public function update(Request $request)
    {
        $this->validate($request, $this->validator());

        $about = About::first();

        $about->update($this->fields($request, $about));

        return ['message' => 'مطلب جدید با موفقیت ثبت شد.'];
    }

    private function validator()
    {
        return [
            'title' => 'required|max:100',
            'summary' => 'required|max:250',
            'content' => 'required',
        ];
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
        ];
    }
}
