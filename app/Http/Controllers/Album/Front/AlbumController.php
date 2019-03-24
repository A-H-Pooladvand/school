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

        return view('album.front.index', compact('albums'));
    }

    public function show($id)
    {
        $album = Album::with('galleries')->findOrFail($id);

        return view('album.front.show', compact('album'));
    }
}
