@extends('_layouts.front.index')


@section('content')


    <main>
        <div class="main">

            <section class="module">
                <div class="container">

                    <div class="row multi-columns-row post-columns">
                        @foreach($notifications as $notification)
                            <div class="col-md-6 col-lg-6">
                                <div class="post">
                                    <div class="post-thumbnail">
                                        <a href={{ route('notification', $notification->id) }}>
                                            <img class="img-rounded" src="{{ image_url($notification->image, 55, 31, true) }}" alt="Blog-post Thumbnail"/>
                                        </a>
                                    </div>
                                    <div class="post-header font-alt">
                                        <h2 class="post-title">
                                            <a href={{ route('notification.show', $notification->id) }}>{{ $notification->title }}</a>
                                        </h2>
                                        <div class="post-meta">{{ $notification->created_at->format('Y-d-m') }}
                                        </div>
                                    </div>
                                    <div class="post-entry">
                                        <p>{{ str_limit($notification->summary, 300) }}</p>
                                    </div>
                                    <div class="post-more"><a class="more-link" href={{ route('notification', $notification->id) }}>Read more</a></div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="text-center">
                        {{ $notifications->links() }}
                    </div>

                </div>
            </section>

        </div>
    </main>

@stop
