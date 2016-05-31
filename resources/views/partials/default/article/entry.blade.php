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
        {!! limit_to_linebreak($article->content, 'article.show', 'article_slug', $article->slug) !!}
    </div>
</div>