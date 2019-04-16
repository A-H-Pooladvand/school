@extends('_layouts.front.index')


@section('content')

    <section class="page_header padding-top text-center">
        <div class="container">
            <div class="row heading_space">
                <div class="col-md-12 page-content heading_space">
                </div>
            </div>
        </div>
    </section>

    <section id="event_detail" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 event wow fadeIn" data-wow-delay="500ms">
                    <img src="{{ image_url($service->image, 77, 40, true) }}" alt="Teachers" class=" border_radius img-responsive bottom15">

                    <h3 class="top30 bottom20">{{ $service->title }}</h3>

                    <div>
                        <a href="#" class="facebook">
                            <i class="icon-icons20"></i>
                            {{ jdate($service->created_at)->format('Y-m-d') }}
                        </a>
                    </div>

                    <p>{!! $service->content !!}</p>

                </div>
                <aside class="col-sm-4 wow fadeIn" data-wow-delay="400ms">
                    <div class="widget heading_space">
                        <h3 class="bottom20">مطالب مرتبط</h3>

                        @foreach($relatedServices as $related)
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

                            @foreach($service->tags as $tag)
                                <li><a href="{{ route('tag.index', $tag->slug) }}">{{ $tag->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="widget">
                        <h3 class="bottom20">دسته ها</h3>
                        <ul class="tags">

                            @foreach($service->categories as $category)
                                <li><a href="{{ route('category.index', $category->id) }}">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </aside>
            </div>
        </div>
    </section>

@stop
