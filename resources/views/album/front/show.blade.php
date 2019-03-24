@extends('_layouts.front.index')


@section('content')

    <div class="main">

        <section class="module-medium">
            <div class="container">

                <ul class="works-grid works-grid-gut works-hover-d" id="works-grid">
                    @foreach($album->galleries as $album)
                        <li class="work-item illustration webdesign">
                            <a class="group1" href="{{ image_url($album->path, 102,76) }}">
                                <div class="work-image">
                                    <img src="{{ image_url($album->path, 56, 35, true) }}" alt="Portfolio Item"/>
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

        <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets_front/css/colorbox.css') }}">
        <style>
            .work-item {
                width: 33.33333% !important;
            }
        </style>
    @endpush

    @push('top-scripts')
        <script src="{{ asset('assets_front/js/jquery.colorbox-min.js') }}"></script>

        <script>
            $(document).ready(function () {
                //Examples of how to assign the Colorbox event to elements
                $(".group1").colorbox({rel: 'group1'});
            });
        </script>

    @endpush

@stop
