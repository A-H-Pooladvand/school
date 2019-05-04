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
            <td>{{ $menu['title'] }}</td>
        </tr>

        <tr>
            <th>لینک</th>
            <td>{{ request()->root() . DIRECTORY_SEPARATOR . $menu['link'] }}</td>
        </tr>

        <tr>
            <th>اولویت</th>
            <td>{{ $menu->priority }}</td>
        </tr>

        <tr>
            <th>زیر منو ها</th>
            <td>
                <ol>
                    @foreach($menu['children'] as $child)
                        <li>
                            <a href="{{ request()->root() . DIRECTORY_SEPARATOR . $child['link'] }}">{{ $child['title'] }}</a>
                        </li>
                    @endforeach
                </ol>
            </td>
        </tr>

        </tbody>
    </table>

@stop

@section('helper_block')

    <div class="form-group helper-block">

        <div class="pull-left">
            {{ Breadcrumbs::render('news-show', $menu) }}
        </div>

        <div class="text-right">
            <a href="{{ route('admin.news.edit', $menu->id) }}" class="btn btn-info">ویرایش</a>
        </div>

    </div>

@stop
