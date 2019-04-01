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
            <th>نام</th>
            <td>{{ $enrollment->first_name }}</td>
        </tr>

        <tr>
            <th>نام خانوادگی</th>
            <td>{{ $enrollment->last_name }}</td>
        </tr>

        <tr>
            <th>تلفن تماس</th>
            <td>{{ $enrollment->phone }}</td>
        </tr>

        <tr>
            <th>رشته</th>
            <td>{!! $enrollment->major !!}</td>
        </tr>

        <tr>
            <th>مقطع</th>
            <td>{{ $enrollment->grade }}</td>
        </tr>

        <tr>
            <th>آدرس</th>
            <td>{{ $enrollment->address }}</td>
        </tr>

        <tr>
            <th>توضیحات</th>
            <td>{{ $enrollment->description }}</td>
        </tr>

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $enrollment->created_at_fa }}</td>
        </tr>

        </tbody>
    </table>

@stop