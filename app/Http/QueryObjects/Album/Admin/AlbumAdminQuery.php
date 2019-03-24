<?php
/**
 * Created by PhpStorm.
 * User: amirhossein
 * Date: 6/14/18
 * Time: 11:55 AM
 */

namespace App\Http\QueryObjects\Album\Admin;


use App\Album;
use Auth;
use Illuminate\Http\Request;

class AlbumAdminQuery
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function validate()
    {
        $rules = [
            'title' => 'required|max:100',
            'image' => 'required',
//            'summary' => 'required|max:250',
//            'content' => 'required'
        ];


        if ('PUT' === $this->request->method())
            $rules['image'] = 'nullable';

        return $rules;
    }

    public function fields(Album $album = null)
    {
        return [
            'user_id' => Auth::id(),
            'title' => $this->request->title,
            'image' => empty($this->request->image) ? $album->image : $this->request->image,
        ];
    }
}