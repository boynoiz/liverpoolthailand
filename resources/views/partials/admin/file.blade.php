@unless (trim($file) === "")
    <div class="uploaded-file">
        {{--<a title="{{ trans('admin.fields.uploaded')  }}" href="{!! $file !!}" target="_blank"> <i class="fa fa-4x fa-file"></i></a>--}}
        <a title="{{ trans('admin.fields.uploaded')  }}" href="{!! $file !!}" target="_blank"><img src="{!! $file !!}"></a>
    </div>
@endunless