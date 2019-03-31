<?php

namespace App\Http\Controllers\Contact\Front;

use App\Contact;
use App\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        $contact = ContactUs::first();

        $this->seo()->setTitle('تماس با ما');
        $this->seo()->setDescription($contact->title);

        return view('contact.front.show', compact('contact'));
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
        ]);


        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'content' => $request['content'],
        ]);

        if ($contact) {
            return back()->with('message', 'درخواست شما ثبت شد. در اسرع وقت به درخواست شما رسیدگی خواهد شد.');
        }

        return back()->with('message', 'مشکلی پیش امده لطفا دوباره تلاش نمایید.');
    }
}
