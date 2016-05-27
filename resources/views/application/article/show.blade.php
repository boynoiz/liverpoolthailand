@extends('layouts.default')

@section('title'){{ getTitle($article) }}@endsection
@section('description'){{ getDescription() }}@endsection

@section('content')
    @if(count($article))
        <!-- Page Title -->
        <section id="page-title">
            <div class="container clearfix">
                <h1><a href="{{ route('category', ['category_slug' => $article->category->slug])  }}">{{ $article->category->title }}</a></h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('root') }}">Home</a></li>
                    <li><a href="{{ route('category', ['category_slug' => $article->category->slug]) }}">{{ $article->category->title }}</a></li>
                    <li class="active">{{ $article->title }}</li>
                </ol>
            </div>
        </section>
        <!-- #page-title end -->

        <!-- Content -->
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="single-post nobottommargin">
                        <!-- Single Post -->
                        <div class="entry clearfix">
                            <!-- Entry Title -->
                            <div class="entry-title">
                                <h2>{{ $article->title }}</h2>
                            </div>
                            <!-- .entry-title end -->
                            <!-- Entry Meta -->
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> {{ Date::createFromFormat('Y-m-d', $article->published_at)->formatLocalized('%A %d %B %Y') }}</li>
                                <li><a href="#"><i class="icon-user"></i> {{ $article->user->name }}</a></li>
                                <li><i class="icon-folder-open"></i> <a href="{{ route('category', ['category_slug' => $article->category->slug]) }}">{{ $article->category->title }}</a></li>
                                <li><a href="#"><i class="icon-eyes"></i>{{ $article->read_count }} Read</a></li>
                            </ul>
                            <!-- .entry-meta end -->
                            <!-- Entry Image -->
                            <div class="entry-image bottommargin">
                                <a href="#"><img src="{{ asset($article->image_path .'large/'. $article->image_name) }}" alt="{{ $article->title }}"></a>
                            </div><!-- .entry-image end -->
                            <!-- Entry Content -->
                            <div class="entry-content notopmargin">
                            {!! $article->content !!}
                            <!-- Post Single - Content End -->
                            </div>
                        </div>
                    @include('partials.default.article.socialShare', [
                            'url' => request()->fullUrl(),
                            'text' => $article->title,
                            'description' => getDescription(),
                            'via' => 'LiverpoolLTF',
                            'image' => url()->asset($article->image_path .'small/'. $article->image_name)
                            ])
                        <!-- .entry end -->
                        <!-- Comments -->
                        <div id="comments" class="clearfix">
                            <div class="fb-comments" data-href="{{request()->fullUrl()}}" data-numposts="5" data-colorscheme="light"></div>
                        </div>
                        <!-- #comments end -->
                    </div>
                </div>
            </div>
        </section><!-- #content end -->
    @endif
@endsection
@push('foot-scripts')
<div id="fb-root"></div>
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
@endpush