<?php

namespace App\Http\Controllers\Contact\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.admin.contacts.index');
    }

    public function items(Request $request)
    {
        $contacts = Contact::query();

        return $this->getGrid($request)->items($contacts);
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
//        return $contact;
        return view('contact.admin.contacts.show', compact('contact'));
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        Contact::whereIn('id', $ids)->delete();
    }
}
