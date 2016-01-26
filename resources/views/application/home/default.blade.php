@extends('layouts.default')
@section('title'){{ getTitle() }}@endsection
@section('description'){{ getDescription() }}@endsection
@section('content')
    <div class="content-wrap">
        <div class="section header-stick bottommargin-sm clearfix" style="padding: 10px 0;">
            <div>
                <div class="container clearfix">
                    @include('partials.default.breakingNews.mainBreakingNews')
                </div>
            </div>
        </div>
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-8 bottommargin">
                    <div class="col_full bottommargin-sm clearfix">
                        @include('partials.default.articles.mainArticle')
                    </div>
                    <div class="col_full bottommargin-sm clearfix">
                        @include('partials.default.match.mainMatch')
                    </div>
                    <div class="col_full bottommargin-sm clearfix">
                        @include('partials.default.topics.mainTopics')
                    </div>
                    <div class="col_full bottommargin-sm clearfix">
                        @include('partials.default.latestNewsV2.mainLatestNews')
                    </div>
                    <div class="bottommargin-sm">
                        @include('partials.default.adsBanner.adsImageMidleTop')
                    </div>
                    <div class="col_full bottommargin-sm clearfix">
                        @include('partials.default.latestColumn.mainLastestColumn')
                    </div>
                    <div class="col_full masonry-thumbs col-6 bottommargin-sm clearfix" data-big="5"
                         data-lightbox="gallery">
                        @include('partials.default.galleryImages.mainImagesGallery')
                    </div>
                </div>
                <!-- #side bar hear -->
                <div class="col-md-4">
                    @include('partials.default.sideBar.mainSidebar')
                </div>
            </div>

        </div>
    </div>
@endsection