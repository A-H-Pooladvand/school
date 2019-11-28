<?php

namespace App\Http\Repositories\Recruitment;

use Storage;
use App\Recruitment;
use Illuminate\Http\Request;

class RecruitmentRepository
{
    /**
     * \App\Recruitment model
     *
     * @var \App\Recruitment
     */
    private $recruitment;

    public function __construct(Recruitment $recruitment)
    {
        $this->recruitment = $recruitment;
    }

    /**
     * Create a new link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array|null  $items
     * @return \App\Recruitment
     */
    public function create(Request $request, array $items = null)
    {
        $file = Storage::put('public/recruitment', $request->file('file'));

        $request->merge(['file' => $file]);

        return $this->recruitment::create(
            $items ?? $request->only([
                'full_name',
                'phone',
                'education',
                'job_position',
                'address',
                'email',
                'collaboration_type',
                'file',
            ])
        );
    }

    /**
     * Find a link by id.
     *
     * @param $id
     * @return \App\Recruitment
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findById($id): Recruitment
    {
        return $this->recruitment::findOrFail($id);
    }

    /**
     * Delete multiple links by given ids.
     *
     * @param $id
     * @return int
     */
    public function delete($id): int
    {
        $ids = explode(',', $id);

        return $this->recruitment::whereIn('id', $ids)->delete();
    }
}