<div class="fancy-title title-border">
    <h3>Activity</h3>
</div>

<div class="col_full masonry-thumbs col-6 bottommargin-lg clearfix" data-big="5" data-lightbox="gallery">
    @if(!empty($lastGalleryImages))
        @foreach($lastGalleryImages as $gallery)
            <a href="{!! url('http://board.liverpoolthailand.com/uploads/' . $gallery->directory , $gallery->masked_file_name) !!}" data-lightbox="gallery-item">
                <img class="image_fade" src="{!! url('http://board.liverpoolthailand.com/uploads/' . $gallery->directory .'/tn_' . $gallery->masked_file_name) !!}" alt="{!! $gallery->caption !!}" title="{!! $gallery->caption !!}">
            </a>
        @endforeach
    @endif
</div>