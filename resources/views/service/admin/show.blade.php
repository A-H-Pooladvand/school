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
            <td>{{ $service['title'] }}</td>
        </tr>

        <tr>
            <th>تصویر شاخص</th>
            <td>
                <img src="{{ image_url($service['image'], 15,10) }}" width="150" height="100" alt="#">
            </td>
        </tr>

        <tr>
            <th>خلاصه</th>
            <td>{{ $service['summary'] }}</td>
        </tr>

        <tr>
            <th>محتوا</th>
            <td>{!! $service['content'] !!}</td>
        </tr>

        @permission('read-user')
        <tr>
            <th>مولف</th>
            <td>
                <a href="{{ route('admin.user.show', $service->author->id) }}">{{ $service->author->fullName() }}</a>
            </td>
        </tr>
        @endpermission

        <tr>
            <th>وضعیت</th>
            <td>{{ $service['status_fa'] }}</td>
        </tr>
        @if(!empty($service['tags']))

            <tr>
                <th>کلمات کلیدی</th>
                <td>
                    @foreach($service['tags'] as $item)
                        <span class="label label-info m-l-1-5">
                            <i class="fa fa-hashtag fa-fw"></i>
                            {{ $item['title'] }}
                        </span>
                    @endforeach
                </td>
            </tr>

        @endif

        @if(!empty($service->categories))
            <tr>
                <th>دسته بندی</th>
                <td>
                    @foreach($service->categories as $category)
                        <span class="badge">{{ $category->title }}</span>
                    @endforeach
                </td>
            </tr>
        @endif

        <tr>
            <th>تاریخ انتشار</th>
            <td>{{ $service['publish_at_fa'] }}</td>
        </tr>

        <tr>
            <th>تاریخ انقضا</th>
            <td>{{ $service['publish_at_fa'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ایجاد</th>
            <td>{{ $service['created_at'] }}</td>
        </tr>

        <tr>
            <th>تاریخ ویرایش</th>
            <td>{{ $service['updated_at'] }}</td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('service-show', $service) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop
