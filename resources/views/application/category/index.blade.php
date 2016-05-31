@extends('layouts.default')

@section('title'){{ getTitle($category) }}@endsection
@section('description'){{ getDescription($category) }}@endsection

@section('content')
    <!-- Page Title -->
    <section id="page-title">
        <div class="container clearfix">
            <h1>{{ $category->title }}</h1>
            <span>{{ $category->description }}</span>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">{{ $category->title }}</li>
            </ol>
        </div>
    </section>
    <!-- #page-title end -->
    <!-- Content -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <!-- Post Content -->
                <div class="col-md-8 nobottommargin clearfix">
                    <!-- Posts-->
                    <div id="posts">
                        @if(!empty($articles))
                            @foreach($articles as $article)
                                @include('partials.default.article.post')
                            @endforeach
                        @endif
                    </div>
                    <!-- #posts end -->

                @if($articles->total() > 5 )
                    <!-- Pagination-->
                        <ul class="pager nomargin">
                            <li class="previous"><a href="{{ $articles->previousPageUrl() }}">&larr; Older</a></li>
                            <li class="next"><a href="{{ $articles->nextPageUrl() }}">Newer &rarr;</a></li>
                        </ul>
                        <!-- .pager end -->
                    @endif

                </div>
                <!-- .postcontent end -->

                <!-- Sidebar -->
                <div class="col-md-4 nobottommargin clearfix">
                    @include('partials.default.sideBar.mainSidebar')
                </div>
                <!-- .sidebar end -->

            </div>

        </div>

    </section>
    <!-- #content end -->
@endsection