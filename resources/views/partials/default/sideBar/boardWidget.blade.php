<div class="widget clearfix">
    <div class="tabs nobottommargin clearfix" id="sidebar-tabs">
        <ul class="tab-nav clearfix">
            <li><a href="#tabs-1">Recent Topics</a></li>
            <li><a href="#tabs-2">Hot Topics</a></li>
        </ul>
        <div class="tab-container">
            <div class="tab-content clearfix" id="tabs-1">
                <div id="recent-post-list-sidebar">
                    @each('partials.default.sideBar.recentTopics', $recentTopics, 'recentTopic', 'partials.default.sideBar.emptyTopics')
                </div>
            </div>
            <div class="tab-content clearfix" id="tabs-2">
                <div id="popular-post-list-sidebar">
                    @each('partials.default.sideBar.popTopics', $popTopics, 'popTopic', 'partials.default.sideBar.emptyTopics')
                </div>
            </div>

        </div>
    </div>
</div>