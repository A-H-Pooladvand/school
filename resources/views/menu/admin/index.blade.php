@extends('_layouts.admin.index')

@section('content')

    @script(easyui/easyui.js)
    @style(easyui/easyui.css)
    @script(jquery-confirm/jquery-confirm.js)
    @style(jquery-confirm/jquery-confirm.css)
    @script(datepicker/datepicker.js)
    @style(datepicker/datepicker.css)

    <table id="dg"></table>

    @push('scripts')
        <script>
            $('#dg').iDataGrid({
                    title: 'لیست منوها',
                    url: '{{ route('admin.menu.items') }}',
                    columns: [[
                        {field: 'checkbox', checkbox: true},
                        {field: 'id', sortable: true, title: 'شناسه', align: 'center'},
                        {
                            field: 'title', sortable: true, width: '200', title: 'عنوان', align: 'center',
                            formatter: function (val, row) {
                                return '<a href="' + '{{ route('admin.menu.index') }}' + '/' + row.id + '" target="_blank">' + val + '</a>';
                            }
                        },
                        {field: 'link', sortable: true, width: '200', title: 'لینک', align: 'left'},
                        {field: 'priority', sortable: true, width: '200', title: 'اولویت', align: 'center'},
                    ]],
                    toolbar: [
                        {
                            name: 'show',
                            link: '{{ route('admin.menu.index') }}' + '/' + '{id}',
                        },
                        {
                            name: 'edit',
                            link: '{{ route('admin.menu.index') }}' + '/' + 'edit' + '/' + '{id}',
                        },
                        {
                            name: 'delete',
                            link: '{{ route('admin.menu.index') }}' + '/' + '{id}',
                        },
                    ]
                }
            );
        </script>
    @endpush

@stop
