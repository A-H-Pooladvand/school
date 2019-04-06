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
              url: '{{ route('admin.enrollment.items') }}',
              columns: [[
                { field: 'checkbox', checkbox: true },
                { field: 'id', sortable: true, title: 'شناسه', align: 'center' },
                { field: 'first_name', sortable: true, title: 'نام', align: 'center' },
                { field: 'last_name', sortable: true, title: 'نام خانوادگی', align: 'center' },
                { field: 'phone', sortable: true, title: 'شماره تلفن', align: 'center' },
                { field: 'major', sortable: true, title: 'رشته', align: 'center' },
                { field: 'grade', sortable: true, title: 'مقطع', align: 'center' },
                { field: 'address', sortable: true, title: 'آدرس', align: 'center' },
                { field: 'description', sortable: true, title: 'توضیحات', align: 'center' },
                {
                  field: 'created_at', width: 150, sortable: true, title: 'تاریخ ایجاد', align: 'center',
                  formatter: function (val, row) {
                    return row.created_at_farsi
                  }
                },
              ]],
              toolbar: [
                {
                  name: 'show',
                  link: '{{ route('admin.enrollment.index') }}' + '/' + '{id}',
                },
                {
                  name: 'delete',
                  link: '{{ route('admin.enrollment.index') }}' + '/' + '{id}',
                },
              ]
            },
            {
              filters: {
                date: ['created_at', 'updated_at'],
              }
            })
        </script>
    @endpush

@stop