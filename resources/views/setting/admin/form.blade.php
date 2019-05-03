@extends('_layouts.admin.index')

@section('content')

    @script(datepicker/datepicker.js)
    @style(datepicker/datepicker.css)

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            <div class="col-sm-8">

                <div class="form-group">
                    <label for="input_title" class="control-label">لینک اینستاگرام</label>
                    <input id="input_title" name="instagram" type="text" class="form-control" value="{{ $setting->instagram ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="input_title" class="control-label">لینک توئیتر</label>
                    <input id="input_title" name="twitter" type="text" class="form-control" value="{{ $setting->twitter ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="input_title" class="control-label">لینکدین</label>
                    <input id="input_title" name="linkedin" type="text" class="form-control" value="{{ $setting->linkedin ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="input_title" class="control-label">تلگرام</label>
                    <input id="input_title" name="telegram" type="text" class="form-control" value="{{ $setting->telegram ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="input_title" class="control-label">آدرس</label>
                    <input id="input_title" name="address" type="text" class="form-control" value="{{ $setting->address ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="input_title" class="control-label">ایمیل</label>
                    <input id="input_title" name="email" type="text" class="form-control" value="{{ $setting->email ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="input_title" class="control-label">تلفن</label>
                    <input id="input_title" name="phone" type="text" class="form-control" value="{{ $setting->phone ?? '' }}">
                </div>

            </div>

            <div class="col-sm-4">

                <div class="form-group">
                    <label for="image" class="control-label">تصویر پیش ثبت نام</label>
                    <div class="input-group">
                <span class="input-group-btn">
                <a id="file-manager" data-input="image" data-preview="image-preview" class="btn btn-primary">
                <i class="fa fa-picture-o"></i>
                <span>انتخاب</span>
                </a>
                </span>
                        <input id="image" readonly class="form-control" type="text" name="enrollment_background">
                    </div>
                </div>

                <div class="form-group position-relative">
                    <img id="image-preview" class="thumbnail {{ ! empty($setting->enrollment_background) ? '' : 'hidden' }}" width="100%" src="{{ image_url($setting->enrollment_background ?? '', 37, 23, true) }}">
                    <span id="close-pic" class="{{ ! empty($setting->enrollment_background) ? '' : 'hidden' }}" style="position: absolute; top: 15px; left: 15px; width: 20px; height: 20px; cursor: pointer">
                        <i class="fa fa-times" style="border: 1px solid #0b0b0b; padding: 0.2rem; border-radius: 4px"></i>
                    </span>
                </div>

                <input type="hidden" id="check-img" name="check_img" value="exist">

                @push('scripts')
                    <script>
                        $(function () {
                            $('#close-pic').click(function () {
                                $(this).closest('.form-group').find('img').addClass('hidden');
                                $('#check-img').val('removed');

                                if ($('#check-img').val() === "removed") {
                                    $('#close-pic').addClass('hidden');
                                } else {
                                    $('#close-pic').removeClass('hidden');
                                }
                            });

                            $('#image-preview').change(function () {
                                if ($('#img-preview').hasClass('hidden')) {
                                    $('#close-pic').addClass('hidden');
                                } else {
                                    $('#close-pic').removeClass('hidden');
                                }
                            });

                        });
                    </script>
                @endpush


            </div>

        </div>

    </form>

    @push('scripts')
        <script>

            $('#file-manager').filemanager('image');

            $(function () {
                $('#image-preview').change(function () {
                    $(this).removeClass('hidden');
                });
            });

        </script>
    @endpush

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop
