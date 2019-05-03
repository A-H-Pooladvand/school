<?php

namespace App\Http\Controllers\About\Front;

use App\About;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function show()
    {
        $about = About::firstOrFail();

        $this->seo()->setTitle($about->title);
        $this->seo()->setDescription($about->summary);

        return view('about.front.show', compact('about'));
    }
}
