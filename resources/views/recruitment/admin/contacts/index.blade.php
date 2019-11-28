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
                    title: 'لیست تماس ها',
                    url: '{{ route('admin.contact.contacts.items') }}',
                    columns: [[
                        {field: 'checkbox', checkbox: true},
                        {field: 'id', sortable: true, title: 'شناسه', align: 'center'},
                        {
                            field: 'name', sortable: true, title: 'نام', align: 'center',
                            formatter: function (val, row) {
                                return '<a href="' + '{{ route('admin.contact.contacts.index') }}' + '/' + row.id + '" target="_blank">' + val + '</a>';
                            }
                        },
                        {field: 'email', sortable: true, title: 'ایمیل', align: 'center'},
                        {field: 'phone', sortable: true, title: 'تلفن تماس', align: 'center'},
                        {field: 'subject', sortable: true, title: 'موضوع تماس', align: 'center'},
                        {field: 'created_at', sortable: true, title: 'تاریخ ایجاد', align: 'center'},
                    ]],
                    toolbar: [
                        {
                            name: 'show',
                            link: '{{ route('admin.contact.contacts.index') }}' + '/' + '{id}',
                        },
                        {
                            name: 'edit',
                            link: '{{ route('admin.contact.contacts.index') }}' + '/' + 'edit' + '/' + '{id}',
                        },
                        {
                            name: 'delete',
                            link: '{{ route('admin.contact.contacts.index') }}' + '/' + '{id}',
                        },
                    ]
                },
                {
                    filters: {
                        date: ['created_at', 'updated_at'],
                        combobox: {
                            'status': [
                                {'text': 'همه', 'value': ''},
                                {'text': 'منتشر شده', 'value': 'publish'},
                                {'text': 'پیشنویس', 'value': 'draft'},
                            ]
                        }
                    }
                });
        </script>
    @endpush

@stop