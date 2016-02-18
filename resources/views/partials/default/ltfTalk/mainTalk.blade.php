<div class="fancy-title title-border">
    <h3>LTF Talk</h3>
</div>
@if(count($latestTalk))
    @foreach($latestTalk as $talk)
<div id="post" class="ipost clearfix">
    <div class="col_half bottommargin-sm">
        <div class="entry-image">
            <a href="#"><img class="image_fade" src="{!! asset($talk->image) !!}" alt="Image"></a>
        </div>
    </div>
    <div class="col_half bottommargin-sm col_last">
        <div class="entry-title">
            <h3><a href="blog-single.html">{!! $talk->title !!}</a></h3>
        </div>
        <ul class="entry-meta clearfix">
            <li><i class="icon-calendar3"></i> {!! $talk->published_at !!}</li>
            <li><i class="fa fa-eye"></i> {!! $talk->read_count !!}</li>
            <li><a href="#"><i class="icon-camera-retro"></i></a></li>
        </ul>
        <div class="entry-content">
            {!! str_limit($talk->content, 300) !!} <a href="{!! route('article', ['article_slug' => $talk->slug]) !!}">Read more</a>
        </div>
    </div>
</div>
@endforeach
@endif