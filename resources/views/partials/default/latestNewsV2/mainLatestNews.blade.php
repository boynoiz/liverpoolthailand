<div class="fancy-title title-border">
    <h3>Latest News</h3>
</div>
@if(count($latestNews))
    @foreach($latestNews as $news)
        <div @if ($news == $latestNews->last()) class="col_one_third col_last" @else class="col_one_third" @endif>
            <div class="ipost clearfix">
                <div class="entry-image">
                    <a href="#">
                        <img class="image_fade"
                             src="@if(empty($news->attach_location)){!! url('board/uploads/noimage.jpg') !!}@else{!! url('board/uploads/' . $news->attach_location) !!}@endif"
                             alt="Image">
                    </a>
                </div>
                <div class="entry-title">
                    <h3>
                        <a href="{!! url('board/topic/' . $news->tid . '-' . $news->title_seo) !!}"
                           target="_blank">
                            {!! $news->title !!}
                        </a>
                    </h3>
                </div>
                <ul class="entry-meta clearfix">
                    <li>
                        <i class="icon-calendar3"></i> {!! date('d/m h:i a', $news->post_date) !!} |
                        <i class="icon-comments"></i> {!! $news->posts !!} |
                        <i class="fa fa-pencil"></i> {!! str_limit($news->author_name, 5, '...') !!}
                    </li>
                </ul>
                <div class="entry-content">
                    {!! str_limit(clean($news->post), 200) !!}
                    <a href="{!! url('board/topic/' . $news->tid . '-' . $news->title_seo) !!}" target="_blank">อ่านต่อ...</a>
                </div>
            </div>
        </div>
    @endforeach
@endif
<div class="clear"></div>
