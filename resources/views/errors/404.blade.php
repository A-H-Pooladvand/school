@extends('_layouts.front.index')

@section('content')

    @push('scripts')
        <script>
            $(function () {
                setInterval(function () {
                    $('.navbar-default').removeClass('no-background')
                }, 100)
            })
        </script>
    @endpush

    <section id="error" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="error wow bounceIn" data-wow-delay="300ms">
                        <h1>404</h1>
                        <h2>404</h2>
                    </div>
                    <p class="heading_space">صفحه مورد نظر اشتباه است یا دیگر موجود نیست.</p>
                    <a href="{{ route('home') }}" class="btn_common blue border_radius wow fadeIn" data-wow-delay="400ms">صفحه اصلی</a>
                </div>
            </div>
        </div>
    </section>

@stop


