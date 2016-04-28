@extends('layouts.admin')

@section('content')
    <p class="text-red"><small>* These field will update from data source automatically by schedule run time (basically every midnight).</small></p>
    {!! form($form) !!}
    @include('partials.admin.tinymce')
@endsection