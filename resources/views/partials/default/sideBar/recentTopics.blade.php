<div class="spost clearfix">
    <div class="entry-image">
        <img class="img-circle" src="@if(empty($recentTopic->pp_thumb_photo)){!! url('board/uploads/profile/default_large.png') !!}@else{!! url('board/uploads/' . $recentTopic->pp_thumb_photo) !!}@endif" alt="{!! $recentTopic->starter_name !!}" title="{!! $recentTopic->starter_name !!}">
    </div>
    <div class="entry-c">
        <div class="entry-title">
            <h4><a href="{!! url('board/topic/' . $recentTopic->tid . '-' . $recentTopic->title_seo) !!}" target="_blank">{!! str_limit($recentTopic->title, 35) !!}</a></h4>
        </div>
        <ul class="entry-meta">
            <li><i class="icon-comments-alt"></i> {!! $recentTopic->posts !!} Comments</li>
        </ul>
    </div>
</div>
