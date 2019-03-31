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

            <div id="projects" class="cbp">

                @foreach($albums as $album)
                    <div class="cbp-item course">
                        <a href="{{ route('album.show', $album->id) }}">
                            <img class="img-rounded" src="{{ image_url($album->image, 27, rand(25, 45), true) }}" alt="{{ $album->title }}" title="{{ $album->title }}">
                        </a>
                    </div>
                @endforeach

                {{--@foreach($albums as $album)
                    <div class="cbp-item course">
                        <img src="{{ image_url($album->image, 27, rand(25, 45), true) }}" alt="">
                        <div class="overlay">
                            <div class="centered text-center">
                                <a href="{{ image_url($album->image, 27, rand(25, 45), true) }}" class="cbp-lightbox opens"> <i class="icon-focus"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach--}}

            </div>
        </div>
    </section>

@stop
