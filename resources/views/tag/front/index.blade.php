@extends('_layouts.front.index')

@section('content')

    <main>
        <div id="main-container">
            <div id="main-content">
                <section class="kopa-area kopa-area-16">
                    <div class="container">
                        <div class="widget kopa-widget-listcourse">
                            <div class="widget-content module-listcourse-04">

                                @component('tag.front.news', ['data' => $news])@endcomponent

                                @component('tag.front.project', ['data' => $projects])@endcomponent

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

@stop