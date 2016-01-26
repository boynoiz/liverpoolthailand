<div class="fancy-title title-border">
    <h3>News</h3>
</div>
<div class="ipost clearfix">
    @each('partials.default.latestNews.newsList', $newsLatests, 'newsLatest', 'partials.default.latestNews.emptyNews')
</div>
<div class="clear"></div>
<div class="col_half nobottommargin">
    @each('partials.default.latestNews.latestNewsTileFirstCol', $lastTopicsTileLefts, 'lastTopicsTileLeft', 'partials.default.latestNews.emptyLatestNewsTile')
</div>

<div class="col_half nobottommargin col_last">
    @each('partials.default.latestNews.latestNewsTileLastCol', $lastTopicsTileRights, 'lastTopicsTileRight', 'partials.default.latestNews.emptyLatestNewsTile')
</div>