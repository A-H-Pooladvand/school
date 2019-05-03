<?php

namespace App\Http\Controllers\Main\Admin;

use App\Setting;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    protected $form = [];

    public function show()
    {
        return view('main.admin.index');
    }

    public function edit()
    {
        $setting = Setting::first();

        $this->form = ['action' => route('admin.setting.update'), 'method' => 'put'];

        return view('setting.admin.form', ['setting' => $setting, 'form' => $this->form]);
    }

    public function update(Request $request): array
    {
        $setting = Setting::firstOrFail();

        $setting->update($this->fields($request));

        return ['message' => 'مطلب با موفقیت ثبت شد.'];
    }

    private function fields(Request $request): array
    {
        return [
            'instagram' => $request['instagram'],
            'twitter' => $request['twitter'],
            'linkedin' => $request['linkedin'],
            'telegram' => $request['telegram'],
            'address' => $request['address'],
            'email' => $request['email'],
            'enrollment_background' => $request['enrollment_background'],
            'phone' => $request['phone'],
        ];
    }
}
