@extends('_layouts.front.index')

@section('content')

    <div class="main">
        <section class="module-medium">
            <div class="container">
                <ul class="works-grid works-grid-gut works-hover-d" id="works-grid">
                    @foreach($albums as $album)
                        <li class="work-item illustration webdesign"><a href="{{ route('album.show', $album->id) }}">
                                <div class="work-image">
                                    <img src="{{ image_url($album->image, 56, 35, true) }}" alt="Portfolio Item"/>
                                </div>

                                <div class="work-caption font-alt">
                                    <h3 class="work-title">{{ $album->title }}</h3>
                                    {{--<div class="work-descr">Lorem ipsum</div>--}}
                                </div>

                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        <div class="text-center">
            {{ $albums->links() }}
        </div>

        <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </div>

@stop