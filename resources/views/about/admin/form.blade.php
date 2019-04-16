@extends('_layouts.admin.index')

@section('content')

    @script(datepicker/datepicker.js)
    @style(datepicker/datepicker.css)

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            <div class="col-sm-8">

                <div class="form-group">
                    <label for="input_title" class="control-label">عنوان</label>
                    <input id="input_title" name="title" type="text" class="form-control" value="{{ $about->title ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="input_summary" class="control-label">خلاصه مطلب</label>
                    <textarea name="summary" id="input_summary" cols="30" rows="4" class="form-control">{{ $about->summary ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    @script(tinymce/tinymce.js)
                    <label for="input_content" class="control-label">محتوا</label>
                    <textarea name="content" id="input_content" class="tinymce">{!!  $about->content ?? ''  !!}</textarea>
                </div>

            </div>

            <div class="col-sm-4">

                <div class="form-group">
                    <label for="image" class="control-label">تصویر شاخص</label>
                    <div class="input-group">
                <span class="input-group-btn">
                <a id="file-manager" data-input="image" data-preview="image-preview" class="btn btn-primary">
                <i class="fa fa-picture-o"></i>
                <span>انتخاب</span>
                </a>
                </span>
                        <input id="image" readonly class="form-control" type="text" name="image">
                    </div>
                </div>

                <div class="form-group position-relative">
                    <img id="image-preview" class="thumbnail {{ ! empty($about->image) ? '' : 'hidden' }}" width="100%" src="{{ image_url($about->image ?? '', 37, 23, true) }}">
                    <span id="close-pic" class="{{ ! empty($about->image) ? '' : 'hidden' }}" style="position: absolute; top: 15px; left: 15px; width: 20px; height: 20px; cursor: pointer">
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
