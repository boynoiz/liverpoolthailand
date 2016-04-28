<div class="fancy-title title-border">
    <h3>LTF Talk</h3>
</div>
@if(count($latestTalk))
    @foreach($latestTalk as $talk)
        <div id="post" class="ipost clearfix">
            <div class="col_half bottommargin-sm">
                <div class="entry-image">
                    <a href="{{ route('article', ['article_slug' => $talk->slug]) }}">
                        <img class="alignleft notopmargin fadeIn animated" data-animate="fadeIn" data-delay="3000" src="{{ asset($talk->image_path . "small" . '/' . $talk->image_name) }}" alt="{{ $talk->description }}" title="{{ $talk->description }}">
                    </a>
                </div>
            </div>
            <div class="col_half bottommargin-sm col_last">
                <div class="entry-title">
                    <h3><a href="{{ route('article', ['article_slug' => $talk->slug]) }}">{{ $talk->title }}</a></h3>
                </div>
                <ul class="entry-meta clearfix">
                    <li>
                        <i class="icon-calendar3"></i> {{ $talk->published_at }} |
                        <i class="fa fa-eye"></i> {{ $talk->read_count }} |
                        <i class="fa fa-pencil"></i> {{ str_limit($talk->user->name, 5, '...') }}
                    </li>
                </ul>
                <div class="entry-content">
                    {!! str_limit($talk->content, 300)  !!}
                    <a href="{{ route('article', ['article_slug' => $talk->slug]) }}">Read more</a>
                </div>
            </div>
        </div>
    @endforeach
@endif