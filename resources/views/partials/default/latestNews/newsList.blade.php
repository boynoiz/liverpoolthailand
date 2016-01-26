<div class="col_half bottommargin-sm">
    <div class="entry-image">
        <a href="{!! url('board/topic/' . $newsLatest->tid . '-' . $newsLatest->title_seo) !!}" target="_blank">
            <img class="image_fade"
                 src="@if(empty($newsLatest->attach_location)){!! url('board/uploads/noimage.jpg') !!}@else{!! url('board/uploads/' . $newsLatest->attach_location) !!}@endif"
                 alt="Image">
        </a>
    </div>
</div>
<div class="col_half bottommargin-sm col_last">
    <div class="entry-title">
        <h3><a href="{!! url('board/topic/' . $newsLatest->tid . '-' . $newsLatest->title_seo) !!}" target="_blank">{!! $newsLatest->title !!}</a></h3>
    </div>
    <ul class="entry-meta clearfix">
        <li>
            <i class="icon-calendar3"></i> {!! date('d/m/y | h:i a', $newsLatest->post_date) !!}
        </li>
        <li>
            <i class="icon-comments"></i> {!! $newsLatest->posts !!}
        </li>
        <li> {!! $newsLatest->author_name !!} </li>
    </ul>
    <div class="entry-content">
        {!! str_limit(clean($newsLatest->post), 200) !!}
        <a href="{!! url('board/topic/' . $newsLatest->tid . '-' . $newsLatest->title_seo) !!}" target="_blank">อ่านต่อ...</a>
    </div>
</div>
