<?php

namespace App\Http\Controllers\Enrollment\Admin;

use App\Enrollment;
use App\Http\Helpers\Traits\ModelTraits;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnrollmentController extends Controller
{
    public function index()
    {
        return view('enrollment.admin.index');
    }

    public function items(Request $request)
    {
        $enrollments = Enrollment::query();

        $enrollments = $this->getGrid($request)->items($enrollments);

        $enrollments['rows'] = $enrollments['rows']->each(function ($item) {
            $item->created_at_farsi = $item->created_at_fa;
        });

        return $enrollments;
    }

    public function show($id)
    {
        $enrollment = Enrollment::findOrFail($id);

        return view('enrollment.admin.show', compact('enrollment'));
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        Enrollment::whereIn('id', $ids)->delete();
    }
}