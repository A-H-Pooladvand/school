@extends('_layouts.front.index')

@section('content')

    <section class="page_header padding-top text-center">
        <div class="container">
            <div class="row heading_space">
                <div class="col-md-12 page-content heading_space"></div>
            </div>
        </div>
    </section>

    <section id="gallery" class="padding">
        <div class="container">

            <div id="projects" class="cbp">

                @foreach($albums as $album)
                    <div class="cbp-item course">
                        <a href="{{ route('album.show', $album->id) }}">
                            <img class="img-rounded" src="{{ image_url($album->image, 27, random_int(25, 45), true) }}" alt="{{ $album->title }}" title="{{ $album->title }}">
                            <div class="text-center" style="background: rgba(0,0,0,0.1); border-radius: 500px; margin-top: .5rem; padding: .5rem 0; color: #5f5e5e">{{ $album->title }}</div>
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
