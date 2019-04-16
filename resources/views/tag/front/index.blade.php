@extends('_layouts.front.index')

@section('content')

    <section class="page_header padding-top text-center heading_space">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-content heading_space">
                    <h1>هشتگ ها</h1>
                </div>
            </div>
        </div>
    </section>

    <main>
        <div id="main-container">
            <div id="main-content">
                <section class="kopa-area kopa-area-16">
                    <div class="container">
                        <div class="widget kopa-widget-listcourse">
                            <div class="widget-content module-listcourse-04">

                                @component('tag.front.news', ['data' => $news])@endcomponent

                                @component('tag.front.notification', ['data' => $notifications])@endcomponent

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

@stop
