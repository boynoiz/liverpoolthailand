<div class="fancy-title title-border">
    <h3>Column</h3>
</div>
@if(count($columnLatests))
    @foreach($columnLatests as $column)
        <div @if ($column == $columnLatests->last()) class="col_one_third col_last" @else class="col_one_third" @endif>
            <div class="ipost clearfix">
                <div class="entry-image">
                    <a href="{!! url('http://board.liverpoolthailand.com/topic/' . $column->tid . '-' . $column->title_seo) !!}">
                        <img class="image_fade"
                             src="{{ empty($column->attach_thumb_location) ? asset('assets/images/noimage.jpg') : url('http://board.liverpoolthailand.com/uploads/' . $column->attach_thumb_location)}}"
                             alt="Image">
                    </a>
                </div>
                <div class="entry-title">
                    <h3>
                        <a href="{!! url('http://board.liverpoolthailand.com/topic/' . $column->tid . '-' . $column->title_seo) !!}" target="_blank">
                            {!! $column->title !!}
                        </a>
                    </h3>
                </div>
                <ul class="entry-meta clearfix">
                    <li>
                        <i class="icon-calendar3"></i> {!! date('d/m h:i a', $column->post_date) !!} |
                        <i class="icon-comments"></i> {!! $column->posts !!} |
                        <i class="fa fa-pencil"></i> {!! str_limit($column->author_name, 5, '...') !!}
                    </li>
                </ul>
                <div class="entry-content">
                    {!! str_limit(clean($column->post), 200) !!}
                    <a href="{!! url('http://board.liverpoolthailand.com/topic/' . $column->tid . '-' . $column->title_seo) !!}" target="_blank">อ่านต่อ...</a>
                </div>
            </div>
        </div>
    @endforeach
@endif
<div class="clear"></div>