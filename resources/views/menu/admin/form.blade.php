@extends('_layouts.admin.index')

@section('content')

    @script(datepicker/datepicker.js)
    @style(datepicker/datepicker.css)

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="alert alert-info">
            <p>* برای ایجاد منوی والد فقط فیلدهای عنوان و اولویت را تکمیل نمایید</p>
            <p>* برای تبدیل منوی فرزند به والد در منوی کشویی "منوی والد" همان فرزند را انتخواب نمایید</p>
        </div>

        <div class="row">

            <div class="col-sm-3">
                <label for="input_title" class="control-label">عنوان</label>
                <input id="input_title" name="title" type="text" class="form-control" value="{{ $menu->title ?? '' }}">
            </div>

            <div class="clearfix"></div>

            <div class="col-sm-3">
                <label for="input_page_id" class="control-label">صفحه</label>
                @component('_components.bootstrap-select--single')
                    @slot('name', 'page_id')
                    @slot('options')
                        @foreach($pages as $page)
                            <option
                                    {{ !empty($menu) && $menu->page_id === null ? 'disabled' : '' }}
                                    {{ !empty($menu->page_id) && $menu->page_id === $page->id ? 'selected' : '' }}
                                    data-link="/pages/{{ $page->slug }}"
                                    value="{{ $page->id }}"
                            >
                                {{ $page->title }}
                            </option>
                        @endforeach
                    @endslot
                @endcomponent
            </div>

            @push('scripts')
                <script>
                    $(function () {

                        $('#input_page_id').on('change', function () {
                            var link = $(this).find("option:selected").data('link');
                            $('#input_link').val(link)
                        });
                    })
                </script>
            @endpush

            <div class="col-sm-3">
                <label for="input_link" class="control-label">لینک</label>
                <input id="input_link" dir="ltr" readonly name="link" type="text" class="form-control" value="{{ $menu->link ?? '' }}">
            </div>

            <div class="clearfix"></div>

            <div class="col-sm-3">
                <label for="input_priority" class="control-label">اولویت</label>
                <input id="input_priority" name="priority" type="number" class="form-control" value="{{ $menu->priority ?? '' }}">
            </div>

            <div class="col-sm-3">
                @component('_components.category--single')
                    @slot('name', 'parent')
                    @slot('label', 'منوی والد')
                    @slot('categories', $menus)
                    @slot('category', $menu ?? '')
                @endcomponent
            </div>

        </div>

    </form>


@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(!empty($menu))
                {{ Breadcrumbs::render('menu-edit', $menu) }}
            @else
                {{ Breadcrumbs::render('menu-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop
