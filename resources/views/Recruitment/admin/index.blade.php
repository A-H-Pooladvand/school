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
              title: 'لیست لینک ها',
              url: '{{ route('admin.grid.index', 'link') }}',
              columns: [
                [
                  { field: 'checkbox', checkbox: true },
                  { field: 'id', sortable: true, title: 'شناسه', align: 'center' },
                  {
                    field: 'title', sortable: true, width: '200', title: 'عنوان', align: 'right',
                    formatter: function (val, row) {
                      return '<a href="' + '{{ route('admin.link.index') }}' + '/' + row.id + '" target="_blank">' + val + '</a>'
                    }
                  },
                  { field: 'link', sortable: true, title: 'لینک', align: 'left' },
                  { field: 'priority', sortable: true, title: 'اولویت', align: 'left' },
                  { field: 'created_at_fa', width: 150, sortable: true, title: 'تاریخ ایجاد', align: 'center' },
                  { field: 'updated_at_fa', width: 150, sortable: true, title: 'تاریخ ویرایش', align: 'center' },
                ]
              ],
              toolbar: [
                {
                  name: 'show',
                  link: '{{ route('admin.link.index') }}' + '/' + '{id}',
                },
                {
                  name: 'edit',
                  link: '{{ route('admin.link.index') }}' + '/' + 'edit' + '/' + '{id}',
                },
                {
                  name: 'delete',
                  link: '{{ route('admin.link.index') }}' + '/' + '{id}',
                },
              ]
            },
            {
              filters: {
                date: ['created_at_fa', 'updated_at_fa'],
              }
            })
        </script>
    @endpush

@stop
