<?php

namespace App\Http\Controllers\Album\Front;

use Cache;
use App\Album;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::latest()->paginate(10);

        $this->seo()->setTitle('البوم تصاویر');
        $this->seo()->setDescription(array_first($albums)->title);

        return view('album.front.index', compact('albums'));
    }

    public function show($id)
    {
        $album = Album::with('galleries')->find($id);

        $this->seo()->setTitle('البوم تصاویر');
        $this->seo()->setDescription($album->title);

        return view('album.front.show', compact('album'));
    }
}
