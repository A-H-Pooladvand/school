@extends('_layouts.front.index')


@section('content')

    <main>
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>

        <div class="main">
            <section class="module">
                <div class="container">
                    <div class="row multi-columns-row post-columns">

                        @foreach($service as $item)
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="post">

                                    <div class="post-thumbnail">
                                        <a href="{{ route('service.show', $item->id) }}">
                                            <img class="img-rounded" src="{{ image_url($item->image, 36, 20, true) }}" alt="Blog-post Thumbnail"/>
                                        </a>
                                    </div>

                                    <div class="post-header font-alt">
                                        <h2 class="post-title"><a href="{{ route('service.show', $item->id) }}">{{ $item->title }}</a></h2>
                                        <div class="post-meta">{{ $item->created_at->format('d-m-Y') }}
                                        </div>
                                    </div>
                                    <div class="post-entry">
                                        <p>{{ str_limit($item->summary, 250) }}</p>
                                    </div>
                                    <div class="post-more"><a class="more-link" href="{{ route('service.show', $item->id) }}">Read more</a></div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="text-center">
                        {{ $service->links() }}
                    </div>

                </div>
            </section>
        </div>
        <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>

@stop
