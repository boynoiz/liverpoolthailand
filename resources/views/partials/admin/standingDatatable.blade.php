@if (isset($dataTable))
    {!! $dataTable->table() !!}
    @if (isset($buttons) && $buttons)
        <link rel="stylesheet" href="{{ url('assets/admin/css/buttons.css') }}">
        <script src="{{ url('assets/admin/js/buttons.server-side.js') }}"></script>
    @endif
    {!! $dataTable->scripts() !!}
@endif