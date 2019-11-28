@php
    /** @var \App\Http\Src\Form\Form $form */
    /** @var \App\Link $link */
@endphp

@extends('_layouts.admin.index')

@section('content')

    <form action="{{ $form->action }}" method="post" id="form">
        {{ $form->method }}

        <div class="row">

            <div class="col-md-8">
                <div class="form-group">
                    <label for="input_title" class="control-label">عنوان</label>
                    <input id="input_title" name="title" type="text" class="form-control" value="{{ $link->title ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="input_link" class="control-label">لینک</label>
                    <input dir="ltr" id="input_link" name="link" type="text" class="form-control" value="{{ $link->link ?? '' }}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="input_priority" class="control-label">اولویت</label>
                    <input dir="ltr" id="input_priority" name="priority" type="number" class="form-control" value="{{ $link->priority ?? '' }}">
                </div>
            </div>

        </div>

    </form>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            @if(! empty($link))
                {{ Breadcrumbs::render('link-edit', $link) }}
            @else
                {{ Breadcrumbs::render('link-create') }}
            @endif
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-info btn-ajax">ذخیره</button>
        </div>

    </div>

@stop
