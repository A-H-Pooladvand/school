<?php

namespace App\Http\Controllers\Recruitment\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Recruitment\Admin\RecruitmentRequest;
use App\Http\Repositories\Recruitment\RecruitmentRepository;

class RecruitmentController extends Controller
{
    /**
     * Recruitment repository.
     *
     * @var \App\Http\Repositories\Recruitment\RecruitmentRepository
     */
    private $recruitmentRepository;

    public function __construct(RecruitmentRepository $recruitmentRepository)
    {
        parent::__construct();
        $this->recruitmentRepository = $recruitmentRepository;
    }

    public function create()
    {
        $form = $this->setForm(route('recruitment.store'));

        return view('recruitment.front.create', compact('form'));
    }

    public function store(RecruitmentRequest $request)
    {
        $this->recruitmentRepository->create($request);

        return back()->with('success_message', 'درخواست شما با موفقیت ثبت شد. با تشکر از شما');
    }
}
