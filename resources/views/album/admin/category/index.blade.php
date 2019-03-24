@extends('_layouts.admin.index')

@section('content')

    @script(easyui/easyui.js)
    @style(easyui/easyui.css)
    @script(jquery-confirm/jquery-confirm.js)
    @style(jquery-confirm/jquery-confirm.css)
    @script(datepicker/datepicker.js)
    @style(datepicker/datepicker.css)

    <table id="tt" class="full-width"></table>

    @push('scripts')
        <script>

            $('#tt').iTreeGrid({
                    title: 'لیست دسته بندی های آلبوم',
                    url: '{{ route('admin.album.category.items') }}',
                    idField: 'id',
                    treeField: 'title',
                    columns: [[
                        {field: 'checkbox', checkbox: true},
                        {field: 'title', title: 'عنوان'},
                        {field: 'slug', title: 'نامک', halign: 'center'},
                        {field: 'priority', title: 'اولویت', halign: 'center'},
                        {field: 'created_at', width: 150, align: 'center', title: 'تاریخ ایجاد'},
                        {field: 'updated_at', width: 150, align: 'center', title: 'تاریخ ویرایش'}
                    ]],
                    toolbar: [
                        {
                            name: 'show',
                            link: '{{ route('admin.album.category.index') }}' + '/' + '{id}',
                        },
                        {
                            name: 'edit',
                            link: '{{ route('admin.album.category.index') }}' + '/' + 'edit' + '/' + '{id}',
                        },
                        {
                            name: 'delete',
                            link: '{{ route('admin.album.category.index') }}' + '/' + '{id}',
                        },
                    ]
                },
                {
                    filters: {
                        date: ['created_at', 'updated_at']
                    }
                }
            );

        </script>
    @endpush

@stop
