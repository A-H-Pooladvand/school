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

        $this->seo()->setTitle('Contact us');
        $this->seo()->setDescription('For being in touch with us please fill the form.');

        $contact = ContactUs::findOrFail(1);
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
            'captcha' => 'required|captcha',
        ]);


        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'content' => $request['content'],
        ]);

        if ($contact) {
            return redirect()->back()->with('message', 'Thank you. we will be in touch with you shortly.');
        }

        return redirect()->back()->with('message', 'Unfortunately there\'s been an error while trying to submit your message, please try again later.');
    }
}
