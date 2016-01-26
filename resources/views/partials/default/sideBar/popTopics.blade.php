<div class="spost clearfix">
    <div class="entry-image">
        <img class="img-circle" src="@if(empty($popTopic->pp_thumb_photo)){!! url('board/uploads/profile/default_large.png') !!}@else{!! url('board/uploads/' . $popTopic->pp_thumb_photo) !!}@endif" alt="{!! $popTopic->starter_name !!}" title="{!! $popTopic->starter_name !!}">
    </div>
    <div class="entry-c">
        <div class="entry-title">
            <h4><a href="{!! url('board/topic/' . $popTopic->tid . '-' . $popTopic->title_seo) !!}" target="_blank">{!! str_limit($popTopic->title, 35) !!}</a></h4>
        </div>
        <ul class="entry-meta">
            <li><i class="icon-comments-alt"></i> {!! $popTopic->posts !!} Comments</li>
        </ul>
    </div>
</div>

