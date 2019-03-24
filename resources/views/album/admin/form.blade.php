@extends('_layouts.admin.index')

@section('content')

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            <div class="col-sm-8">

                <div class="form-group">
                    <label for="input_title" class="control-label">عنوان</label>
                    <input id="input_title" name="title" type="text" class="form-control" value="{{ $album->title ?? '' }}">
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

                <div class="form-group">
                    <img id="image-preview" class="thumbnail {{ !empty($album->image) ? '' : 'hidden' }}" width="100%" src="{{ image_url($album->image ?? '', 37,23,true) }}">
                </div>

                @component('_components.category--multiple')

                    @slot('name') categories[] @endslot
                    @slot('label') دسته بندی @endslot
                    @slot('categories', $categories)
                    @if(!empty($category_ids))
                        @slot('category_ids', $category_ids)
                    @endif

                @endcomponent


            </div>

        </div>

        @component('_components.filemanager--multiple')

            @slot('type') gallery @endslot
            @slot('label') گالری تصاویر @endslot
            @slot('index') 0 @endslot
            @if(!empty($album->galleries))
                @slot('data', $album->galleries)
            @endif

        @endcomponent

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

        <div class="pull-left">
            @if(!empty($album))
                {{ Breadcrumbs::render('album-edit', $album) }}
            @else
                {{ Breadcrumbs::render('album-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop