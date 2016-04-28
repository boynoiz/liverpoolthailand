<div class="col_half clearfix">
    <div class="fancy-title title-border">
        <h3>Recent Topics</h3>
    </div>
    @if(count($latestTopics))
        @foreach($latestTopics as $latestTopic)
            <div class="spost clearfix">
                <div class="entry-c">
                    <div class="entry-title">
                        <h4>
                            <a href="{!! url('board/topic/' . $latestTopic->tid . '-' . $latestTopic->title_seo) !!}">{!! $latestTopic->title !!}</a>
                        </h4>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li>
                            <i class="icon-calendar3" title="ตั้งกระทู้เมื่อวันที่"></i> {!! date('d/m h:i a', $latestTopic->start_date) !!} |
                            <i class="icon-comments" title="จำนวนคอมเมนต์"></i> {!! $latestTopic->posts !!} |
                            <i class="icon-user" title="ตั้งกระทู้โดย"></i> {!! $latestTopic->starter_name !!}
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    @endif
</div>
<div class="col_half clearfix col_last">
    <div class="fancy-title title-border">
        <h3>Hot Topics</h3>
    </div>
    @if(count($hotTopics))
        @foreach($hotTopics as $hotTopic)
            <div class="spost clearfix">
                <div class="entry-c">
                    <div class="entry-title">
                        <h4>
                            <a href="{!! url('board/topic/' . $hotTopic->tid . '-' . $hotTopic->title_seo) !!}">{!! $hotTopic->title !!}</a>
                        </h4>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li>
                            <i class="icon-calendar3" title="ตั้งกระทู้เมื่อวันที่"></i> {!! date('d/m h:i a', $hotTopic->start_date) !!} |
                            <i class="icon-comments" title="จำนวนคอมเมนต์"></i> {!! $hotTopic->posts !!} |
                            <i class="icon-user" title="ตั้งกระทู้โดย"></i> {!! $hotTopic->starter_name !!}
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    @endif
</div>