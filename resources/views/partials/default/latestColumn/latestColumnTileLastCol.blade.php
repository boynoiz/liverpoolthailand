<div class="spost clearfix">
    <div class="entry-image">
        <a href="{!! url('board/topic/' . $lastColumnTileRight->tid . '-' . $lastColumnTileRight->title_seo) !!}"><img src="@if(empty($lastColumnTileRight->attach_location)){!! url('board/uploads/noimage.jpg') !!}@else{!! url('board/uploads/' . $lastColumnTileRight->attach_location) !!}@endif" alt=""></a>
    </div>
    <div class="entry-c">
        <div class="entry-title">
            <h4>
                <a href="{!! url('board/topic/' . $lastColumnTileRight->tid . '-' . $lastColumnTileRight->title_seo) !!}">{!! $lastColumnTileRight->title !!}</a>
            </h4>
        </div>
        <ul class="entry-meta">
            <li><i class="icon-calendar3"></i> {!! date('d/m/y | h:i a', $lastColumnTileRight->start_date) !!}</li>
            <li><i class="icon-comments"></i> {!! $lastColumnTileRight->posts !!} </li>
        </ul>
    </div>
</div>