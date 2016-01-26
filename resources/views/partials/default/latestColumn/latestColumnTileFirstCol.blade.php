<div class="spost clearfix">
    <div class="entry-image">
        <a href="{!! url('board/topic/' . $lastColumnTileLeft->tid . '-' . $lastColumnTileLeft->title_seo) !!}"><img src="@if(empty($lastColumnTileLeft->attach_location)){!! url('board/uploads/noimage.jpg') !!}@else{!! url('board/uploads/' . $lastColumnTileLeft->attach_location) !!}@endif" alt=""></a>
    </div>
    <div class="entry-c">
        <div class="entry-title">
            <h4>
                <a href="{!! url('board/topic/' . $lastColumnTileLeft->tid . '-' . $lastColumnTileLeft->title_seo) !!}">{!! $lastColumnTileLeft->title !!}</a>
            </h4>
        </div>
        <ul class="entry-meta">
            <li><i class="icon-calendar3"></i> {!! date('d/m/y | h:i a', $lastColumnTileLeft->start_date) !!}</li>
            <li><i class="icon-comments"></i> {!! $lastColumnTileLeft->posts !!} </li>
        </ul>
    </div>
</div>