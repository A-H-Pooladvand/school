<?php

namespace App\Http\Controllers\Recruitment\Admin;

use App\Http\Controllers\Controller;
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

    public function index()
    {
        return view('recruitment.admin.index');
    }

    public function show($id)
    {
        $recruitment = $this->recruitmentRepository->findById($id)->load('author');

        return view('recruitment.admin.show', compact('recruitment'));
    }

    public function destroy($id): void
    {
        $this->recruitmentRepository->delete($id);
    }
}