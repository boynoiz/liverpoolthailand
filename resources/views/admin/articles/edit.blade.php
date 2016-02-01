@extends('layouts.admin')

@section('content')
    {!! form($form) !!}
    @include('partials.admin.tinymce')
    @include('partials.admin.file', ['file'=> $object->preview])
@endsection