<?php

namespace App\Http\Controllers\Recruitment\Admin;

use Illuminate\Http\Request;
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

    public function index()
    {
        return view('recruitment.admin.index');
    }

    public function create()
    {
        $form = $this->setForm(route('admin.recruitment.store'));

        return view('recruitment.admin.form', compact('form'));
    }

    public function store(RecruitmentRequest $request): array
    {
        $recruitment = $this->recruitmentRepository->create($request);

        return ['message' => "{$recruitment->title} با موفقیت ایجاد شد."];
    }

    public function show($id)
    {
        $recruitment = $this->recruitmentRepository->findById($id)->load('author');

        return view('recruitment.admin.show', compact('recruitment'));
    }

    public function edit($id)
    {
        $form = $this->setForm(route('admin.recruitment.update', $id), 'PUT');

        $recruitment = $this->recruitmentRepository->findById($id);

        return view('recruitment.admin.form', compact('recruitment', 'form'));
    }

    public function update(Request $request, $id): array
    {
        $recruitment = $this->recruitmentRepository->findById($id);

        $recruitment = $this->recruitmentRepository->update($recruitment, $request);

        return ['message' => "{$recruitment->title} با موفقیت ویرایش شد."];
    }

    public function destroy($id): void
    {
        $this->recruitmentRepository->delete($id);
    }
}