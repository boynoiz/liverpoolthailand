<div class="col_half bottommargin-sm">
    <div class="entry-image">
        <a href="{!! url('board/topic/' . $columnLatest->tid . '-' . $columnLatest->title_seo) !!}">
            <img class="image_fade" src="@if(empty($columnLatest->attach_location)){!! url('board/uploads/noimage.jpg') !!}@else{!! url('board/uploads/' . $columnLatest->attach_location) !!}@endif"
                 alt="Image">
        </a>
    </div>
</div>
<div class="col_half bottommargin-smn col_last">
    <div class="entry-title">
        <h3>
            <a href="{!! url('board/topic/' . $columnLatest->tid . '-' . $columnLatest->title_seo) !!}" target="_blank">
                {!! $columnLatest->title !!}
            </a>
        </h3>
    </div>
    <ul class="entry-meta clearfix">
        <li><i class="icon-calendar3"></i> {!! date('d/m/y | h:i a', $columnLatest->post_date) !!} </li>
        <li><i class="icon-comments"></i> {!! $columnLatest->posts !!} </li>
        <li> {!! $columnLatest->author_name !!} </li>
    </ul>
    <div class="entry-content">
        {!! str_limit(clean($columnLatest->post), 150) !!}
        <a href="{!! url('board/topic/' . $columnLatest->tid . '-' . $columnLatest->title_seo) !!}" target="_blank">อ่านต่อ...</a>
    </div>
</div>