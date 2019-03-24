@extends('_layouts.front.index')

@section('content')

    <main>
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <div class="main">


            <section class="module-small">
                <div class="container">

                    <div class="post">

                        @if(!empty($about->image))
                            <div class="post-thumbnail text-center">
                                {{--<img src="{{ image_url($about->image, 192, 60) }}" class="img-rounded" alt="Blog Featured Image"/>--}}
                                <div class="img--custom" style="background: url({{ image_url($about->image, 108, 45) }}) no-repeat center center; width: 100%; height: 450px;background-size: 100% 100%;border-radius: 4px"></div>
                            </div>
                        @endif

                        <div class="post-header font-alt">
                            <h1 class="post-title">{{ $about->title }}</h1>
                            <h5>{{ $about->summary }}</h5>
                            <div class="post-meta">{{ $about->created_at->format('Y-d-m') }}
                            </div>
                        </div>
                        <div class="post-entry">
                            <p>{!! $about->content !!}</p>
                        </div>
                    </div>
                </div>

            </section>
            <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>

            @if(!empty($about->galleries))
                <section class="module">
                    <div class="container">
                        <div class="row">
                            <div class="owl-carousel text-center" data-items="5" data-pagination="false" data-navigation="false">

                                @foreach($about->galleries as $item)
                                    <div class="owl-item">
                                        <div class="col-sm-12">
                                            <div class="ex-product">

                                                <a href="#">
                                                    <img class="img-circle" src="{{ image_url($item->path, 50, 50, true) }}" alt="{{ $item->title }}"/>
                                                </a>

                                                <h4 class="shop-item-title font-alt">{{ $item->title }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            @endif

        </div>
        <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>

@stop
