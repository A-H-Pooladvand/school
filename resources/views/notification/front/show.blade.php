@extends('_layouts.front.index')


@section('content')

    <section class="page_header padding-top text-center">
        <div class="container">
            <div class="page-content heading_space">
                <h1>{{ $notification->title }}</h1>
            </div>
        </div>
    </section>

    <section id="course_all" class="padding-bottom-half padding-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 course_detail wow fadeIn" data-wow-delay="400ms">
                    <img src="{{ image_url($notification->image, 77, 39, true) }}" alt="Course" class=" border_radius img-responsive bottom15">
                    <div class="detail_course">

                        <div class="info_label">
                            <span class="icony"><i class="icon-users3"></i></span>
                            <p>دسته</p>
                            <h5>
                                <a href="{{ route('category.index', $notification->categories[0]->id) }}">
                                    {{ $notification->categories[0]->title }}
                                </a>
                            </h5>
                        </div>

                        <div class="info_label">
                            <span class="icony">
                                <i class="icon-users3"></i>
                            </span>
                            <p>انشار</p>
                            <h5>{{ jdate($notification->created_at)->format('Y-m-d') }}</h5>
                        </div>

                    </div>
                    <h3 class="top30 bottom20">{{ $notification->title }}</h3>
                    <p>{!! $notification->content !!}</p>
                </div>

                <aside class="col-sm-4 wow fadeIn" data-wow-delay="400ms">
                    <div class="widget heading_space">
                        <h3 class="bottom20">مطالب مرتبط</h3>

                        @foreach($relatedNotifications as $related)
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

                            @foreach($notification->tags as $tag)
                                <li><a href="{{ route('tag.index', $tag->slug) }}">{{ $tag->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="widget">
                        <h3 class="bottom20">دسته ها</h3>
                        <ul class="tags">

                            @foreach($notification->categories as $category)
                                <li><a href="{{ route('category.index', $category->id) }}">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </aside>

            </div>
        </div>
    </section>

@stop
