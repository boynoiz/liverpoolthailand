@extends('layouts.admin')

@section('content')
    @include('partials.admin.fixtureDatatable', ['dataTable' => $dataTable, 'buttons' => true])
@endsection