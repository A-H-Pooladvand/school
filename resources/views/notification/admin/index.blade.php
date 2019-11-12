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
              title: 'لیست اطلاعیه ها',
              url: '{{ route('admin.notification.items') }}',
              columns: [
                [
                  { field: 'checkbox', checkbox: true },
                  { field: 'id', sortable: true, title: 'شناسه', align: 'center' },
                  {
                    field: 'title', sortable: true, width: '200', title: 'عنوان', align: 'center',
                    formatter: function (val, row) {
                      return '<a href="' + '{{ route('admin.notification.index') }}' + '/' + row.id + '" target="_blank">' + val + '</a>'
                    }
                  },
                  { field: 'summary', sortable: true, width: '200', title: 'خلاصه', align: 'center' },
                  { field: 'priority', sortable: true, title: 'اولویت', align: 'center' },
                  { field: 'status_fa', sortable: true, title: 'وضعیت', align: 'center', },
                  { field: 'created_at_fa', width: 150, sortable: true, title: 'تاریخ ایجاد', align: 'center' },
                  { field: 'updated_at_fa', width: 150, sortable: true, title: 'تاریخ ویرایش', align: 'center' },
                ]
              ],
              toolbar: [
                {
                  name: 'show',
                  link: '{{ route('admin.notification.index') }}' + '/' + '{id}',
                },
                {
                  name: 'edit',
                  link: '{{ route('admin.notification.index') }}' + '/' + 'edit' + '/' + '{id}',
                },
                {
                  name: 'delete',
                  link: '{{ route('admin.notification.index') }}' + '/' + '{id}',
                },
              ]
            },
            {
              filters: {
                date: ['created_at', 'updated_at'],
                combobox: {
                  'status': [
                    { 'text': 'همه', 'value': '' },
                    { 'text': 'منتشر شده', 'value': 'publish' },
                    { 'text': 'پیشنویس', 'value': 'draft' },
                  ]
                }
              }
            })
        </script>
    @endpush

@stop
