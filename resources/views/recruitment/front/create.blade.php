@extends('_layouts.front.index')

@section('content')

    <section class="page_header padding-top text-center">
        <div class="container">
            <div class="row heading_space">
                <div class="col-md-12 page-content heading_space"></div>
            </div>
        </div>
    </section>

    <section id="contact" class="padding">
        <div class="container">

            <form action="{{ $form->action }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ $form->method }}

                @include('_includes.error-handler')

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="input_full_name" class="control-label">
                                نام کامل
                                <span class="text-danger">*</span>
                            </label>
                            <input id="input_full_name" name="full_name" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="input_phone" class="control-label">
                                شماره تماس
                                <span class="text-danger">*</span>
                            </label>
                            <input id="input_phone" name="phone" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="input_education" class="control-label">
                                تحصیلات
                                <span class="text-danger">*</span>
                            </label>
                            <input id="input_education" name="education" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="input_job_position" class="control-label">
                                شغل مورد درخواست
                                <span class="text-danger">*</span>
                            </label>
                            <input id="input_job_position" name="job_position" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="input_address" class="control-label">
                                آدرس محل سکونت
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="address" id="input_address" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="input_email" class="control-label">ایمیل</label>
                            <input id="input_email" name="email" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="input_collaboration_type" class="control-label">
                                نوع همکاری
                                <span class="text-danger">*</span>
                            </label>
                            <select name="collaboration_type" id="input_collaboration_type" class="form-control">
                                <option value="part_time">پاره وقت</option>
                                <option value="full_time">تمام وقت</option>
                                <option value="teleworking">دورکاری</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="input_file" class="control-label">
                                ارسال فایل رزومه
                                <span class="text-danger">*</span>
                            </label>
                            <input id="input_file" name="file" type="file" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">ارسال</button>
                        </div>

                    </div>

                </div>

            </form>

        </div>
    </section>

@stop
