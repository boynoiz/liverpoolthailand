<script crossorigin="anonymous" integrity="sha256-rsPUGdUPBXgalvIj4YKJrrUlmLXbOb6Cp7cdxn1qeUc=" src="https://cdn.jsdelivr.net/jquery/1.11.3/jquery.min.js"></script>
{{--<script async type="text/javascript" src="{{asset('assets/js/app.min.js')}}"></script>--}}
{{--<script async type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>--}}
<script defer type="text/javascript" src="{{asset('assets/js/plugins.js')}}"></script>
<script defer type="text/javascript" src="{{asset('assets/js/functions.js')}}"></script>
{{--<script defer type="text/javascript" src="{{asset('assets/js/custom-functions.js')}}"></script>--}}
<div id="fb-root"></div>
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=249458228576642";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '249458228576642',
            xfbml: true,
            version: 'v2.4'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>