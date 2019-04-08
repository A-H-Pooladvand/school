@extends('_layouts.front.index')


@section('content')

    <section class="page_header padding-top text-center">
        <div class="container">
            <div class="heading_space page-content">
                <h1>{{ $news->title }}</h1>
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
                            <img class="img-rounded" src="{{ image_url($news->image, 83, 38, true) }}" alt="{{ $news->title }}">
                        </div>
                        <h3>{{ $news->title }}</h3>
                        <ul class="comment margin10">
                            <li><a href="#">{{ jdate($news->created_at)->format('Y-m-d') }}</a></li>
                        </ul>
                        <p class="margin10">{{ $news->content }}</p>

                    </article>
                </div>
                <div class="col-md-3 col-sm-4 wow fadeIn" data-wow-delay="400ms">

                    <aside class="sidebar bg_grey border-radius" data-wow-delay="400ms">
                        <div class="widget heading_space">
                            <h3 class="bottom20">مطالب مرتبط</h3>

                            @foreach($relatedNews as $related)
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="{{ image_url($related->image, 7, 7, true) }}" alt="post" class="img-rounded">
                                    </a>
                                    <div class="media-body">
                                        <h5 class="bottom5">{{ $related->title }}</h5>
                                        <p class="bottom5">{{ str_limit($related->summary, 50) }}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="widget">
                            <h3 class="bottom20">هشتگ ها</h3>
                            <ul class="tags">

                                @foreach($news->tags as $tag)
                                    <li><a href="#">{{ $tag->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                    </aside>

                </div>
            </div>
        </div>
    </section>

@stop
