@extends('_layouts.front.index')


@section('content')

    <section class="page_header padding-top text-center">
        <div class="container">
            <div class="page-content heading_space">
                <h1>تماس با ما</h1>
            </div>
        </div>
    </section>

    <section id="contact" class="padding">
        <div class="container">

            <h1 class="mb-1">{{ $contact->title }}</h1>
            <p>{{ $contact->content }}</p>

            <hr>

            <div class="row padding-bottom">
                <div class="col-md-4 contact_address heading_space fadeInLeft" data-wow-delay="4500ms">
                    <h2 class="heading heading_space">
                        <span>با ما در تماس باشید</span>
                        <span class="divider-left"></span>
                    </h2>

                    <div class="address">
                        <i class="icon icon-map-pin border_radius"></i>
                        <h4>آدرس</h4>
                        <p>ستارخان - خیابان خسرو جنوبی (صادقی پور) - 27 غربی - پلاک 5</p>
                    </div>

                    <div class="address">
                        <i class="icon icon-mail border_radius"></i>
                        <h4>ایمیل</h4>
                        <p><a href="mailto:info@maedehsch.ir">info@maedehsch.ir</a></p>
                    </div>

                    <div class="address">
                        <i class="icon icon-phone4 border_radius"></i>
                        <h4>شماره تماس</h4>
                        <p>021-44249559</p>
                    </div>

                </div>
                <div class="col-md-8 fadeInRight" data-wow-delay="4500ms">
                    <h2 class="heading heading_space">میتوانید با فرم زیر با ما تماس بگیرید<span class="divider-left"></span></h2>
                    <form class="form-inline findus" method="POST" action="{{ route('contact.store') }}">
                        {{ csrf_field() }}

                        @include('_components.errors')
                        @include('_components.message')

                        <div class="row">

                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="نام" name="name" id="name">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="ایمیل" name="email" id="email">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="تلفن تماس" name="phone" id="website">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="موضوع تماس" name="subject" id="website">
                            </div>

                            <div class="col-md-12">
                                <textarea placeholder="توضیحات" name="content" id="message"></textarea>
                                <button class="btn_common yellow border_radius" id="btn_submit">ارسال</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
            <div class="row wow bounceIn" data-wow-delay="300ms">
                <div class="col-md-12">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>

@stop
