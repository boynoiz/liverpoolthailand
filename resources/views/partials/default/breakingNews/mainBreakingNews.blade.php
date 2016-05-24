<span class="label label-danger bnews-title">Breaking News:</span>
<div class="fslider bnews-slider nobottommargin" data-speed="800" data-pause="6000"
     data-arrows="false"
     data-pagi="false">
    <div class="flexslider">
        <div class="slider-wrap">
            @if(count($fbFeeds))
                @foreach($fbFeeds as $feed)
                    <div class="slide">
                        <a href="https://www.facebook.com/LiverpoolThailand/posts/{{ substr($feed->id, strpos($feed->id, '_')+1) }}" target="_blank">
                            <strong>
                                {{ Date::setLocale('en') }}
                                {{ Date::createFromFormat('Y-m-d H:i:s.u',$feed->created_time->date,'UTC')->tz('Asia/Bangkok')->diffForHumans() }}
                                {{ Date::setLocale('th') }} :
                            </strong>
                            {{ str_limit($feed->message, 140,'...') }}
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>