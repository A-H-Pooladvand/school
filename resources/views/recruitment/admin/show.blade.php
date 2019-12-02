@php
    /** @var \App\Recruitment $recruitment */
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

        <tr>
            <th>نام کامل</th>
            <td>{{ $recruitment->full_name }}</td>
        </tr>

        <tr>
            <th>تلفن تماس</th>
            <td>{{ $recruitment->phone }}</td>
        </tr>

        <tr>
            <th>تحصیلات</th>
            <td>{{ $recruitment->education }}</td>
        </tr>

        <tr>
            <th>شغل مورد درخواست</th>
            <td>{{ $recruitment->job_position }}</td>
        </tr>

        <tr>
            <th>آدرس</th>
            <td>{{ $recruitment->address }}</td>
        </tr>

        <tr>
            <th>ایمیل</th>
            <td>{{ $recruitment->email }}</td>
        </tr>

        <tr>
            <th>نوع همکاری</th>
            <td>{{ $recruitment->collaboration_type_fa }}</td>
        </tr>

        <tr>
            <th>رزومه</th>
            <td>
                <a href="/{{ $recruitment->file }}" target="_blank">دانلود</a>
            </td>
        </tr>

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $recruitment->created_at }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $recruitment->updated_at }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')
    <div class="form-group helper-block">
        <div class="text-right">
            <a href="{{ route('admin.contact.edit', 1) }}" class="btn btn-info">ویرایش</a>
        </div>
    </div>
@stop
