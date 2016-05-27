@extends('layouts.default')

@section('title'){{ getTitle($articles) }}@endsection
@section('description'){{ getDescription() }}@endsection

@section('content')
        <!-- Page Title -->
        <section id="page-title">
            <div class="container clearfix">
                <h1>Articles</h1>
                <span>Our Latest Articles</span>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Articles</li>
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
                            @if(count($articles))
                                @foreach($articles as $article)
                                    <div class="entry clearfix">
                                        <div class="entry-image">
                                            <a href="{{ route('article.show', ['article_slug' => $article->slug]) }}" data-lightbox="image" target="_blank"><img class="image_fade" src="{{ asset($article->image_path .'medium/'. $article->image_name) }}" alt="Standard Post with Image"></a>
                                        </div>
                                        <div class="entry-title">
                                            <h2><a href="{{ route('article.show', ['article_slug' => $article->slug]) }}" target="_blank">{{ $article->title }}</a></h2>
                                        </div>
                                        <ul class="entry-meta clearfix">
                                            <li><i class="icon-calendar3"></i> {{ Date::createFromFormat('Y-m-d', $article->published_at)->formatLocalized('%A %d %B %Y') }}</li>
                                            <li><i class="icon-user"></i> {{ $article->user->name }}</li>
                                            <li><i class="icon-folder-open"></i> <a href="{{ route('category', ['category_slug' => $article->category->slug]) }}"> {{ $article->category->title }}</a></li>
                                        </ul>
                                        <div class="entry-content">
                                            {!! str_limit($article->content, 300)  !!}
                                            <a href="{{ route('article', ['article_slug' => $article->slug]) }}" target="_blank">Read more</a>
                                        </div>
                                    </div>
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