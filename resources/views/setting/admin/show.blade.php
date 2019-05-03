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
            <td>{{ $setting['title'] }}</td>
        </tr>

        @if(isset($setting['image']))
            <tr>
                <th>تصویر شاخص</th>
                <td>
                    <img src="{{ image_url($setting['image'], 15,10) }}" width="150" height="100" alt="#">
                </td>
            </tr>
        @endif

        <tr>
            <th>خلاصه</th>
            <td>{{ $setting['summary'] }}</td>
        </tr>

        <tr>
            <th>محتوا</th>
            <td>{!! $setting['content'] !!}</td>
        </tr>

        @permission('read-user')
        <tr>
            <th>مولف</th>
            <td>
                <a href="{{ route('admin.user.show', $setting->author->id) }}">{{ $setting->author->fullName() }}</a>
            </td>
        </tr>
        @endpermission

        <tr>
            <th>وضعیت</th>
            <td>{{ $setting['status_fa'] }}</td>
        </tr>

        <tr>
            <th>تاریخ انتشار</th>
            <td>{{ $setting['publish_at_fa'] }}</td>
        </tr>

        <tr>
            <th>تاریخ انقضا</th>
            <td>{{ $setting['publish_at_fa'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $setting['created_at'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $setting['updated_at'] }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('setting-show', $setting) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.setting.edit', $setting->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop