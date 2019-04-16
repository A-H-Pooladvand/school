@extends('_layouts.front.index')

@section('content')

    <section class="page_header padding-top text-center">
        <div class="container">
            <div class="row heading_space">
                <div class="col-md-12 page-content heading_space"></div>
            </div>
        </div>
    </section>

    <section id="about" class="padding">
        <div class="container aboutus">
            <div class="row">

                <div class="col-md-7 wow fadeInLeft" data-wow-delay="300ms">
                    <h2 class="heading heading_space">
                        {{ $about->title }}
                        <span class="divider-left"></span>
                    </h2>
                    <h4 class="bottom25">{{ $about->summary }}</h4>
                    <p class="bottom25">{!! $about->content !!}</p>
                </div>

                <div class="col-md-5 wow fadeInRight" data-wow-delay="300ms">
                    <div class="image">
                        <img class="img-rounded" src="{{ image_url($about->image, 52, 33, true) }}" alt="{{ $about->title }}" title="{{ $about->title }}">
                    </div>
                </div>

            </div>
        </div>
    </section>

@stop
