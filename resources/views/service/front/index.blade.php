@extends('_layouts.front.index')


@section('content')

    <section class="page_header padding-top text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-content heading_space">
                    <h1>رشته ها</h1>
                </div>
            </div>
        </div>
    </section>

    <section id="events" class="padding-bottom">
        <div class="container">
            <div class="row">

                @foreach($services as $service)
                    <div class="col-sm-6 col-md-4">
                        <div class="events margin_top wow fadeIn" data-wow-delay="300ms">
                            <div class="image">
                                <img src="{{ image_url($service->image, 36, 27, true) }}" alt="eventss" class="border_radius">
                            </div>
                            <h4 class="top30"><a href="{{ route('service.show', $service->id) }}">{{ $service->title }}</a></h4>
                            <p class="bottom20 margin10">{{ str_limit($service->summary, 120) }}</p>
                            <div class="clearfix">
                                <ul class="comment pull-left">
                                    <li><a href="#" class="facebook">{{ jdate($service->created_at)->ago() }}</a></li>
                                </ul>
                                <ul class="comment pull-right">
                                    <li><a href="#" class="facebook"><i class="icon-icons20"></i> {{ jdate($service->created_at)->format('Y-m-d') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="text-center">
                    {{ $services->links() }}
                </div>

            </div>
        </div>
    </section>

@stop
