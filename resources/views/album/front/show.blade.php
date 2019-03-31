@extends('_layouts.front.index')


@section('content')

    <section class="page_header padding-top">
        <div class="container">
            <div class="heading_space page-content">
                <h1>البوم تصاویر</h1>
            </div>
        </div>
    </section>

    <section id="gallery" class="padding">
        <div class="container">

            <div class="mb-3">
                <h3 class="mb-3">{{ $album->title }}</h3>
                <img class="img-rounded" src="{{ image_url($album->image, 114, 30, true) }}" alt="{{ $album->title }}" style="width: 100%">
            </div>

            <div id="projects" class="cbp">

                @foreach($album->galleries as $album)
                    <div class="cbp-item course">
                        <img src="{{ image_url($album->path, 27, rand(25, 45), true) }}" alt="{{ $album->title }}">
                        <div class="overlay">
                            <div class="centered text-center">
                                <a href="{{ image_url($album->path) }}" class="cbp-lightbox opens"> <i class="icon-focus"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@stop
