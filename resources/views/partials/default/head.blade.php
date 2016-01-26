<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
<meta name="_token" content="{{ csrf_token() }}" />
<meta property="og:type" content="website">
<meta property="og:url" content="{{ Request::url() }}">
<meta name="twitter:url" content="{{ Request::url() }}">
<meta name="og:title" content="@yield('title')" >
<meta name="twitter:title" content="@yield('title')">
<meta name="description" property="og:description" content="@yield('description')">
<meta name="twitter:description" content="@yield('description')">
<meta name="google-site-verification" content="ZMIvTYxbOul4hK8tnBOuXiALRA83z42ri90rmbuZR0M" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/images/favicons/apple-touch-icon-57x57.png')}}">
<link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/images/favicons/apple-touch-icon-60x60.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/images/favicons/apple-touch-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/images/favicons/apple-touch-icon-76x76.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/images/favicons/apple-touch-icon-114x114.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/images/favicons/apple-touch-icon-120x120.png')}}">
<link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/images/favicons/apple-touch-icon-144x144.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/images/favicons/apple-touch-icon-152x152.png')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/favicons/apple-touch-icon-180x180.png')}}">
<link rel="icon" type="image/png" href="{{asset('assets/images/favicons/favicon-32x32.png')}}" sizes="32x32">
<link rel="icon" type="image/png" href="{{asset('assets/images/favicons/favicon-194x194.png')}}" sizes="194x194">
<link rel="icon" type="image/png" href="{{asset('assets/images/favicons/favicon-96x96.png')}}" sizes="96x96">
<link rel="icon" type="image/png" href="{{asset('assets/images/favicons/android-chrome-192x192.png')}}" sizes="192x192">
<link rel="icon" type="image/png" href="{{asset('assets/images/favicons/favicon-16x16.png')}}" sizes="16x16">
<link rel="manifest" href="{{asset('assets/images/favicons/manifest.json')}}">
<meta name="apple-mobile-web-app-title" content="LTF">
<meta name="application-name" content="LTF">
<meta name="msapplication-TileColor" content="#ff0000">
<meta name="msapplication-TileImage" content="{{asset('assets/images/favicons/mstile-144x144.png')}}">
<meta name="theme-color" content="#ffffff">
