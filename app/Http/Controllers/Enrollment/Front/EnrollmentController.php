<?php

namespace App\Http\Controllers\Enrollment\Front;

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
    }
}
