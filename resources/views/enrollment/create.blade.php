@extends('_layouts.front.index')

@section('content')

    <section class="page_header padding-top">
        <div class="container">
            <div class="page-content heading_space">
                <h1>پیش ثبت نام</h1>
            </div>
        </div>
    </section>

    <section id="contact" class="padding">
        <div class="container">
            <div class="fadeInRight" data-wow-delay="4500ms">
                <h2 class="heading heading_space">
                    <span>لطفا فرم زیر را تکمیل نمایید</span>
                    <span class="divider-left"></span>
                </h2>
                <form class="form-inline findus" method="POST" action="{{ route('enrollment.store') }}">
                    {{ csrf_field() }}

                    @include('_components.errors')
                    @include('_components.message')

                    <div class="row">

                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="نام دانش آموز" name="first_name">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="نام خانوادگی" name="last_name">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="شماره تماس" name="phone">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="رشته" name="major">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="مقطع تحصیلی" name="grade">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="آدرس" name="address">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <textarea placeholder="توضیحات" name="content"></textarea>
                            <button class="btn_common yellow border_radius" id="btn_submit">ارسال</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </section>

@stop
