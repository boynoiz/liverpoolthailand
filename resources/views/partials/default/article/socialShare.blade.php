<!-- Post Single - Share -->
<div class="si-share noborder clearfix">
    <span>Share this Post:</span>
    <div class="social-buttons">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" class="social-icon si-borderless si-facebook" target="_blank">
            <i class="icon-facebook"></i>
            <i class="icon-facebook"></i>
        </a>
        <a href="https://twitter.com/intent/tweet?text={{ $text }}&url={{ urlencode($url) }}&via={{ $via }}" class="social-icon si-borderless si-twitter" target="_blank">
            <i class="icon-twitter"></i>
            <i class="icon-twitter"></i>
        </a>
        <a href="https://pinterest.com/pin/create/button/?{{
        http_build_query([
            'url' => $url,
            'media' => $image,
            'description' => $description
        ])
        }}" class="social-icon si-borderless si-pinterest" target="_blank">
            <i class="icon-pinterest"></i>
            <i class="icon-pinterest"></i>
        </a>
        <a href="https://plus.google.com/share?url={{ urlencode($url) }}" class="social-icon si-borderless si-gplus" target="_blank">
            <i class="icon-gplus"></i>
            <i class="icon-gplus"></i>
        </a>
        <a href="#" class="social-icon si-borderless si-rss">
            <i class="icon-rss"></i>
            <i class="icon-rss"></i>
        </a>
        <a href="#" class="social-icon si-borderless si-email3">
            <i class="icon-email3"></i>
            <i class="icon-email3"></i>
        </a>
    </div>
</div><!-- Post Single - Share End -->
@push('foot-scripts')
<script type="text/javascript">
    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > a', function(e){

        var
                verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
                'width='+popupSize.width+',height='+popupSize.height+
                ',left='+verticalPos+',top='+horisontalPos+
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }
    });
</script>
@endpush