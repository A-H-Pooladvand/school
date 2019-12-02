<?php

namespace App\Http\Controllers\Contact\Front;

use App\Contact;
use App\Setting;
use App\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function show()
    {
        $contact = ContactUs::firstOrFail();

        $setting = Setting::first();

        $this->seo()->setTitle('تماس با ما');
        $this->seo()->setDescription($contact->title);

        return view('contact.front.show', compact('contact', 'setting'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'nullable|email|min:3|max:100',
            'phone' => 'required',
            'subject' => 'required|max:50',
            'content' => 'required|max:500',
            //'captcha' => 'required|captcha',
        ], [
            'name.required' => 'فیلد نام مورد نیاز است.',
            'email.email' => 'فیلد ایمیل نامعتبر است.',
            'phone.required' => 'فیلد تلفن مورد نیاز است.',
            'subject.required' => 'فیلد موضوع تماس مورد نیاز است.',
            'content.required' => 'فیلد توضیحات مورد نیاز است.',
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'content' => $request['content'],
        ]);

        return back()->with(
            'message',
            $contact
                ? 'درخواست شما ثبت شد. در اسرع وقت به درخواست شما رسیدگی خواهد شد.'
                : 'مشکلی پیش امده لطفا دوباره تلاش نمایید.'
        );
    }
}
