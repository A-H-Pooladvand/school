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

        <tr>
            <th>عنوان</th>
            <td>{{ $about['title'] }}</td>
        </tr>

        @if(isset($about['image']))
            <tr>
                <th>تصویر شاخص</th>
                <td>
                    <img src="{{ image_url($about['image'], 15,10) }}" width="150" height="100" alt="#">
                </td>
            </tr>
        @endif

        <tr>
            <th>خلاصه</th>
            <td>{{ $about['summary'] }}</td>
        </tr>

        <tr>
            <th>محتوا</th>
            <td>{!! $about['content'] !!}</td>
        </tr>

        @permission('read-user')
        <tr>
            <th>مولف</th>
            <td>
                <a href="{{ route('admin.user.show', $about->author->id) }}">{{ $about->author->fullName() }}</a>
            </td>
        </tr>
        @endpermission

        <tr>
            <th>وضعیت</th>
            <td>{{ $about['status_fa'] }}</td>
        </tr>

        <tr>
            <th>تاریخ انتشار</th>
            <td>{{ $about['publish_at_fa'] }}</td>
        </tr>

        <tr>
            <th>تاریخ انقضا</th>
            <td>{{ $about['publish_at_fa'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $about['created_at'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $about['updated_at'] }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('about-show', $about) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop