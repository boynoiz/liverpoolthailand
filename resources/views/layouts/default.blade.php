<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    @include('partials.default.head')
    @include('partials.default.styles')
    @include('partials.default.scripts')
</head>
<body class="stretched dark {!! Request::is('no-transition') ? 'no-transition' : '' !!}" data-loader="10" data-animation-in="fadeIn" data-loader-color="#FF0000" data-speed-in="1500" data-animation-out="fadeOut" data-speed-out="800">
<div id="wrapper" class="clearfix">
    <!--====================Top Bar========================= -->
    <div id="top-bar">
        @include('partials.default.topbar.mainTopbar')
    </div>
    <!-- #top-bar end -->
    <!--=====================Header======================== -->
    <header id="header" class="sticky-style-2">
        @include('partials.default.logo')
        <div class="container clearfix"></div>
        @include('partials.default.navbar')
    </header>
    <!-- #header end -->
    <!--=====================Content======================== -->
    <section id="content">
        @yield('content')
    </section>
    <!-- #content end -->
    @include('partials.default.footerBar.mainFooterBar')
</div>
<!-- #wrapper end -->
<!--====================Go To Top========================= -->
<div id="gotoTop" class="icon-angle-up"></div>
<!-- add javascripts -->
@include('partials.default.footerscript')
</body>
</html>