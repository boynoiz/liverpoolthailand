<div class="spost clearfix">
    <div class="entry-image">
        <a href="{!! url('board/topic/' . $lastTopicsTileRight->tid . '-' . $lastTopicsTileRight->title_seo) !!}" target="_blank"><img src="@if(empty($lastTopicsTileRight->attach_location)){!! url('board/uploads/noimage.jpg') !!}@else{!! url('board/uploads/' . $lastTopicsTileRight->attach_location) !!}@endif" alt=""></a>
    </div>
    <div class="entry-c">
        <div class="entry-title">
            <h4>
                <a href="{!! url('board/topic/' . $lastTopicsTileRight->tid . '-' . $lastTopicsTileRight->title_seo) !!}" target="_blank">{!! $lastTopicsTileRight->title !!}</a>
            </h4>
        </div>
        <ul class="entry-meta">
            <li><i class="icon-calendar3"></i> {!! date('d/m/y | h:i a', $lastTopicsTileRight->start_date) !!}</li>
            <li><i class="icon-comments"></i> {!! $lastTopicsTileRight->posts !!} </li>
        </ul>
    </div>
</div>