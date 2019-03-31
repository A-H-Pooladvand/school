@extends('_layouts.front.index')

@section('content')

    <section class="page_header padding-top">
        <div class="container">
            <div class="page-content heading_space">
                <h1>اطلاعیه ها</h1>
            </div>
        </div>
    </section>

    <section id="course_all" class="padding-bottom">
        <div class="container">
            <div class="row">

                @foreach($notifications as $notification)
                    <div class="col-sm-6">
                        <div class="course margin_top wow fadeIn" data-wow-delay="400ms">
                            <div class="image bottom25">
                                <img src="{{ image_url($notification->image, 36, 24, true) }}" alt="Course" class="border_radius">
                            </div>
                            <h3 class="bottom10 mb-1">
                                <a href="{{ route('notification.show', $notification->id) }}">{{ $notification->title }}</a>
                            </h3>
                            <p class="bottom20">{{ $notification->summary }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@stop
