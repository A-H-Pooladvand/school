@extends('_layouts.admin.index')

@section('content')

    @script(datepicker/datepicker.js)
    @style(datepicker/datepicker.css)

    <form action="{{ $form['action'] }}" method="post" id="form">
        {{ method_field($form['method'] ?? 'POST') }}

        <div class="row">

            @foreach($menus as $menu)

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="input_title" class="control-label">عنوان</label>
                        <input id="input_title" name="menus_title[]" type="text" class="form-control input-sm" value="{{ $menu['title'] ?? '' }}">
                        <input name="menus_id[]" type="hidden" value="{{ $menu->page_id }}">
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="input_priority" class="control-label">اولویت</label>
                        <input id="input_priority" name="menus_priority[]" type="number" class="form-control input-sm text-center" value="{{ $menu['priority'] ?? '' }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="input_link" class="control-label">لینک</label>
                        <input dir="ltr" id="input_link" name="menus_link[]" type="text" readonly class="form-control input-sm" value="{{ $menu['link'] ?? '' }}">
                    </div>
                </div>

            @endforeach

            @foreach($pages as $page)

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="input_title" class="control-label">عنوان</label>
                        <input id="input_title" name="pages_title[]" type="text" class="form-control input-sm">
                        <input name="pages_id[]" type="hidden" value="{{ $page->id }}">
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="input_priority" class="control-label">اولویت</label>
                        <input id="input_priority" name="pages_priority[]" type="number" class="form-control text-center">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="input_link" class="control-label">لینک</label>
                        <input dir="ltr" id="input_link" name="pages_link[]" type="text" readonly class="form-control input-sm" value="{{ DIRECTORY_SEPARATOR .'pages'.DIRECTORY_SEPARATOR.$page->slug }}">
                    </div>
                </div>

            @endforeach

        </div>

    </form>


@stop

@section('helper_block')

    <div class="form-group helper-block">

        {{--<div class="pull-left">
            @if(!empty($menu))
                {{ Breadcrumbs::render('menu-edit', $menu) }}
            @else
                {{ Breadcrumbs::render('menu-create') }}
            @endif
        </div>--}}

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop
