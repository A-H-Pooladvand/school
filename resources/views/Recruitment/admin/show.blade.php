@php
    /** @var \App\Link $link */
@endphp

@extends('_layouts.admin.index')

@section('content')

    <table class="table table-striped table-show">
        <thead>
        <tr>
            <th>عنوان</th>
            <th>مشخصات</th>
        </tr>
        </thead>
        <tbody>

        @permission('read-user')
        <tr>
            <th>مولف</th>
            <td>
                <a href="{{ route('admin.user.show', $link->author->id) }}">{{ $link->author->fullName() }}</a>
            </td>
        </tr>
        @endpermission

        <tr>
            <th>عنوان</th>
            <td>{{ $link->title }}</td>
        </tr>

        <tr>
            <th>لینک</th>
            <td>{{ $link->link }}</td>
        </tr>

        <tr>
            <th>اولویت</th>
            <td>{{ $link->priority }}</td>
        </tr>

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $link['created_at_fa'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $link['updated_at_fa'] }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')
    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('link-show', $link) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.link.edit', $link->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>
@stop