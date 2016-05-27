@extends('layouts.default')

@section('title'){{ getTitle($page) }}@endsection
@section('description'){{ getDescription($page) }}@endsection

@section('content')
    @if(count($page))
        <!-- Page Title -->
        <section id="page-title">
            <div class="container clearfix">
                <h1>{{ $page->title }}</h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('root') }}">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">{{ $page->title }}</li>
                </ol>
            </div>
        </section>
        <!-- #page-title end -->
        <!-- Content -->
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="single-post nobottommargin">
                        <div class="entry clearfix">
                            <!-- Entry Image -->
                            <div class="entry-image bottommargin center">
                                <img src="{{ asset($page->image_path . $page->image_name) }}" alt="{{ $page->description }}" title="{{ $page->description }}">
                            </div>
                            <!-- .entry-image end -->
                            <!-- Entry Content -->
                            <div class="entry-content notopmargin">
                            {!! $page->content !!}
                            <!-- Post Single - Content End -->
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- #content end -->
    @endif
@endsection