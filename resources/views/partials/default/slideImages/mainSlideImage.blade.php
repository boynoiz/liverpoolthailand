<div class="fslider flex-thumb-grid grid-6"
     data-animation="fade"
     data-arrows="true"
     data-thumbs="true"
     data-smoothHeight="true">
    <div class="flexslider">
        <div class="slider-wrap">
            @each('partials.default.slideImages.slide', $lastTopicsImages, 'lastTopicsImage', 'partials.default.slideImages.noImageSlide')
        </div>
    </div>
</div>
