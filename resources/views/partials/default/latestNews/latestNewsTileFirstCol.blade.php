<div class="spost clearfix">
    <div class="entry-image">
        <a href="{!! url('board/topic/' . $lastTopicsTileLeft->tid . '-' . $lastTopicsTileLeft->title_seo) !!}" target="_blank"><img src="@if(empty($lastTopicsTileLeft->attach_location)){!! url('board/uploads/noimage.jpg') !!}@else{!! url('board/uploads/' . $lastTopicsTileLeft->attach_location) !!}@endif" alt=""></a>
    </div>
    <div class="entry-c">
        <div class="entry-title">
            <h4>
                <a href="{!! url('board/topic/' . $lastTopicsTileLeft->tid . '-' . $lastTopicsTileLeft->title_seo) !!}" target="_blank">{!! $lastTopicsTileLeft->title !!}</a>
            </h4>
        </div>
        <ul class="entry-meta">
            <li><i class="icon-calendar3"></i> {!! date('d/m/y | h:i a', $lastTopicsTileLeft->start_date) !!}</li>
            <li><i class="icon-comments"></i> {!! $lastTopicsTileLeft->posts !!} </li>
        </ul>
    </div>
</div>