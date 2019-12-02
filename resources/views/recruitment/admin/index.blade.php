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
              url: '{{ route('admin.grid.index', 'recruitment') }}',
              columns: [[
                { field: 'checkbox', checkbox: true },
                { field: 'id', sortable: true, title: 'شناسه', align: 'center' },
                {
                  field: 'full_name', sortable: true, title: 'نام کامل', align: 'center',
                  formatter: function (val, row) {
                    return '<a href="' + '{{ route('admin.recruitment.index') }}' + '/' + row.id + '" target="_blank">' + val + '</a>'
                  }
                },
                { field: 'email', sortable: true, title: 'ایمیل', align: 'center' },
                { field: 'phone', sortable: true, title: 'تلفن تماس', align: 'center' },
                { field: 'education', sortable: true, title: 'تحصیلات', align: 'center' },
                { field: 'job_position', sortable: true, title: 'شغل مورد درخواست', align: 'center' },
                { field: 'collaboration_type_fa', sortable: true, title: 'شغل مورد درخواست', align: 'center' },
                { field: 'created_at_fa', width: 150, sortable: true, title: 'تاریخ ایجاد', align: 'center' },
              ]],
              toolbar: [
                {
                  name: 'show',
                  link: '{{ route('admin.recruitment.index') }}' + '/' + '{id}',
                },
                {
                  name: 'delete',
                  link: '{{ route('admin.recruitment.index') }}' + '/' + '{id}',
                },
              ]
            },
            {
              filters: {
                date: ['created_at_fa'],
                combobox: {
                  'collaboration_type_fa': [
                    { 'text': 'همه', 'value': '' },
                    { 'text': 'تمام وقت', 'value': 'full_time' },
                    { 'text': 'پاره وقت', 'value': 'part_time' },
                    { 'text': 'دورکاری', 'value': 'teleworking' },
                  ]
                }
              }
            })
        </script>
    @endpush

@stop