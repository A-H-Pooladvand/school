<?php

namespace App\Http\Controllers\Enrollment\Front;

use App\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnrollmentController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        parent::__construct();

        $this->request = $request;
    }

    public function create()
    {
        return view('enrollment.create');
    }

    public function store()
    {
        $this->validate($this->request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'major' => 'required',
            'grade' => 'required',
            'address' => 'required',
        ]);

        Enrollment::create([
            'first_name' => $this->request['first_name'],
            'last_name' => $this->request['last_name'],
            'phone' => $this->request['phone'],
            'major' => $this->request['major'],
            'grade' => $this->request['grade'],
            'address' => $this->request['address'],
            'description' => $this->request['description'],
        ]);

        return back()->with('message', 'درخواست شما با موفقیت ارسال شد و پس از بررسی با شما تماس خاصل خواهد شد');
    }
}
