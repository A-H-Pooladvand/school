@extends('_layouts.front.index')


@section('content')

    <section class="page_header padding-top">
        <div class="container">
            <div class="page-content heading_space">
                <h1>اخبار</h1>
            </div>
        </div>
    </section>

    <section id="blog" class="padding">
        <div class="container">
            <h2 class="hidden">Our Blog</h2>

            @foreach($news as $item)
                <article class="blog_item heading_space wow fadeInLeft" data-wow-delay="300ms">
                    <div class="row">

                        <div class="col-md-5 col-sm-5 heading_space">
                            <div class="image">
                                <img src="{{ image_url($item->image, 32, 20, true) }}" alt="blog" class="border_radius">
                            </div>
                        </div>

                        <div class="col-md-7 col-sm-7 heading_space">
                            <h3>
                                <a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a>
                            </h3>
                            <ul class="comment margin10">
                                <li><a href="#">{{ jdate($item->created_at)->format('Y-m-d') }}</a></li>
                            </ul>

                            <p class="margin10">{{ $item->summary }}</p>

                            <a class=" btn_common btn_border margin10 border_radius" href="{{ route('news.show', $item->id) }}">بیشتر</a>
                        </div>

                    </div>
                </article>
            @endforeach

            <div class="text-center">{{ $news->links() }}</div>

        </div>
    </section>

@stop
