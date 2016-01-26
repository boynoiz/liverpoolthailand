<!-- =================Footer============================ -->
<footer id="footer" class="dark">
    <div class="container">
        <!-- =================Footer Widgets============================ -->
        <div class="footer-widgets-wrap clearfix">
            <div class="col_two_third">
                <div class="col_one_third">
                    <div class="widget clearfix">
                        <img src="{{asset('assets/images/logo.png')}}" alt="" class="footer-logo">
                        <p>No. 1 <strong>Liverpool FC</strong> Fanpage in Thailand,
                        News update and Community for <strong>the KOP</strong> of Thailand</p>
                        {{--<div style="background: url('../../../assets/images/world-map.png') no-repeat center center; background-size: 100%;">--}}
                            {{--<address>--}}
                                {{--<strong>Headquarters:</strong><br>--}}
                                {{--795 Folsom Ave, Suite 600<br>--}}
                                {{--San Francisco, CA 94107<br>--}}
                            {{--</address>--}}
                            {{--<abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 8547 632521<br>--}}
                            {{--<abbr title="Fax"><strong>Fax:</strong></abbr> (91) 11 4752 1433<br>--}}
                            {{--<abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com--}}
                        {{--</div>--}}
                    </div>
                </div>
                <div class="col_one_third">
                    <div class="widget widget_links clearfix">
                        <h4>Site Maps</h4>
                        <ul>
                            <li><a href="/"><div>Home</div></a></li>
                            <li><a href="#"><div>News</div></a></li>
                            <li><a href="#"><div>Articles</div></a></li>
                            <li><a href="#"><div>Match & Fixture</div></a></li>
                            <li><a href="#"><div>Live</div></a></li>
                            <li><a href="#"><div>Teams</div></a></li>
                            <li><a href="#"><div>Shop</div></a></li>
                            <li><a href="#"><div>About us</div></a></li>
                            <li><a href="{!! url('board/') !!}"><div>Board</div></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col_one_third col_last">
                    <div class="widget clearfix">
                        <h4>Blank Content</h4>
                        <div id="post-list-footer">
                            <div class="spost clearfix">
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">...</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li>...</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="spost clearfix">
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">...</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li>...</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="spost clearfix">
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">...</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li>...</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col_one_third col_last">
                <div class="widget clearfix" style="margin-bottom: -20px;">
                    <div class="row">
                        <div class="col-md-6 bottommargin-sm">
                            <div class="counter counter-small">
                                <span data-from="1000" data-to="{!! $fbLikeCounter !!}"
                                      data-refresh-interval="80" data-speed="1000"
                                      data-comma="true">
                                </span>
                            </div>
                            <h5 class="nobottommargin">Total Fans</h5>
                        </div>
                        <div class="col-md-6 bottommargin-sm">
                            <div class="counter counter-small">
                                <span data-from="100" data-to="{!! $totalMembers !!}"
                                      data-refresh-interval="50" data-speed="1000"
                                      data-comma="true">
                                </span>
                            </div>
                            <h5 class="nobottommargin">Total Members</h5>
                        </div>
                    </div>
                </div>
                {{--<div class="widget subscribe-widget clearfix">--}}
                    {{--@include('partials.default.footerBar.footerSubscribe')--}}
                {{--</div>--}}
                <div class="widget clearfix">
                    @include('partials.default.footerBar.footerWidget')
                </div>
            </div>
        </div>
        <!-- .footer-widgets-wrap end -->
    </div>
    <!-- ====================Copyrights========================= -->
    <div id="copyrights">
        <div class="container clearfix">
            <div class="col_half">
                &copy; 2000-15 All Rights Reserved by Liverpool Thailand Fanclub.<br>
                <div class="copyright-links">
                    <a href="#">Terms of Use</a> /
                    <a href="#">Privacy Policy</a>
                </div>
            </div>
            <div class="col_half col_last tright">
                {{--@include('partials.default.footerBar.footerBottomWidget')--}}
                <div class="clear"></div>
                <i class="icon-envelope2"></i> info@liverpoolthailand.com
                <span class="middot">&middot;</span>
                <i class="icon-headphones"></i> (+66)02-5838466
            </div>
        </div>
    </div>
    <!-- #copyrights end -->
</footer>
<!-- #footer end -->