@extends('_layouts.front.index')

@section('content')

    <section class="page_header padding-top text-center">
        <div class="container">
            <div class="row heading_space">
                <div class="col-md-12 page-content heading_space"></div>
            </div>
        </div>
    </section>

    <section id="blog" class="padding-bottom-half padding-top">
        <h3 class="hidden">hidden</h3>
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8 wow fadeIn" data-wow-delay="400ms">
                    <article class="blog_item padding-bottom-half heading_space">
                        <div class="image bottom25">
                            <img class="img-rounded" src="{{ image_url($page->image, 83, 38, true) }}" alt="{{ $page->title }}">
                        </div>
                        <h3>{{ $page->title }}</h3>
                        <ul class="comment margin10">
                            <li><a href="#">{{ jdate($page->created_at)->format('Y-m-d') }}</a></li>
                        </ul>
                        <p class="margin10">{!!  $page->content  !!}</p>

                    </article>
                </div>
            </div>
        </div>
    </section>

@stop
