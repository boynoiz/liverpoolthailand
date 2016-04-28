@extends('layouts.admin')

@section('content')
    @include('partials.admin.standingDatatable', ['dataTable' => $dataTable, 'buttons' => true])
@endsection