<a href="{!! url('board/uploads/' . $lastGalleryImage->directory , $lastGalleryImage->masked_file_name) !!}" data-lightbox="gallery-item">
    <img class="image_fade" src="{!! url('board/uploads/' . $lastGalleryImage->directory , 'tn_' . $lastGalleryImage->masked_file_name) !!}" alt="{!! $lastGalleryImage->caption !!}" title="{!! $lastGalleryImage->caption !!}">
</a>