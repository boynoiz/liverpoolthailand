@extends('layouts.default')

@section('title'){{ getTitle($page) }}@endsection
@section('description'){{ getDescription($page) }}@endsection

@section('content')
    @if(count($page))
        <article class="post">
            <header class="post-header">
                <div class="post-title">
                    <h2>{{ $page->title }}</h2>
                </div>
            </header>
            <div class="post-excerpt">
                {!! $page->content !!}
            </div>
            <footer class="post-footer">
            </footer>
        </article>
    @endif
@endsection