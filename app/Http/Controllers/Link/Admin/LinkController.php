<?php

namespace App\Http\Controllers\Link\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Link\Admin\LinkRequest;
use App\Http\Repositories\Link\LinkRepository;

class LinkController extends Controller
{
    /**
     * Link repository.
     *
     * @var \App\Http\Repositories\Link\LinkRepository
     */
    private $linkRepository;

    public function __construct(LinkRepository $linkRepository)
    {
        parent::__construct();
        $this->linkRepository = $linkRepository;
    }

    public function index()
    {
        return view('link.admin.index');
    }

    public function create()
    {
        $form = $this->setForm(route('admin.link.store'));

        return view('link.admin.form', compact('form'));
    }

    public function store(LinkRequest $request): array
    {
        $link = $this->linkRepository->create($request);

        return ['message' => "{$link->title} با موفقیت ایجاد شد."];
    }

    public function show($id)
    {
        $link = $this->linkRepository->findById($id)->load('author');

        return view('link.admin.show', compact('link'));
    }

    public function edit($id)
    {
        $form = $this->setForm(route('admin.link.update', $id), 'PUT');

        $link = $this->linkRepository->findById($id);

        return view('link.admin.form', compact('link', 'form'));
    }

    public function update(Request $request, $id): array
    {
        $link = $this->linkRepository->findById($id);

        $link = $this->linkRepository->update($link, $request);

        return ['message' => "{$link->title} با موفقیت ویرایش شد."];
    }

    public function destroy($id): void
    {
        $this->linkRepository->delete($id);
    }
}