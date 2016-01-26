<div class="slide" data-thumb="@if(empty($lastTopicsImage->attach_location)){!! url('board/uploads/noimage.jpg') !!}@else{!! url('board/uploads/' . $lastTopicsImage->attach_thumb_location) !!}@endif">
    <a href="{!! url('board/topic/' . $lastTopicsImage->tid . '-' . $lastTopicsImage->title_seo) !!}" target="_blank">
        <img src="@if(empty($lastTopicsImage->attach_location)){!! url('board/uploads/noimage.jpg') !!}@else{!! url('board/uploads/' . $lastTopicsImage->attach_location) !!}@endif" alt="">
        <div class="overlay">
            <div class="text-overlay">
                <div class="text-overlay-title">
                    <h2>{!! $lastTopicsImage->title !!}</h2>
                </div>
                <div class="text-overlay-meta">
                    <span>Hot News!</span>
                </div>
            </div>
        </div>
    </a>
</div>