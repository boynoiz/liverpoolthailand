<div class="tabs tabs-bb clearfix" id="gamePanel">
    <livematch></livematch>
    <template id="match-template">
        <ul class="tab-nav clearfix">
            <li v-if="(match.timer === 0 && match.status !== 'HT') || !match.status"><a href="#matchPanel" id="match-status"> Up Coming</a></li>
            <li v-else><a href="#matchPanel" id="match-status"><img src="{{ asset('assets/images/live2.gif') }}"> Live</a></li>
            <li><a href="#lastMatchPanel">Last Match</a></li>
            <li><a href="#tablePanel">EPL Table</a></li>
        </ul>
        <div class="tab-container">
            <div v-if="match.match_id" class="tab-content nobottommargin clearfix" id="matchPanel">
                @include('partials.default.match.liveMatch')
            </div>
            <div v-else class="tab-content nobottommargin clearfix" id="matchPanel">
                @include('partials.default.match.endOfSeason')
            </div>
            @if(count($lastMatch))
                @include('partials.default.match.lastMatch')
            @endif
            @if(count($standing))
                @include('partials.default.match.standing')
            @endif
        </div>
    </template>
</div>
@push('foot-scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>
<script type="text/javascript" src="//js.pusher.com/3.0/pusher.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/locale/th.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/livescore.js') }}"></script>
<script type="text/javascript">
    setInterval(times, 1000);
    if (times == false) {
        clearInterval(times);
    }
    function times() {
        var now = moment();
        var kickoff = moment($('#countdown-kickoff').data('date-countdown'), "YYYY-MM-DD h:mm:ss");
        var count = kickoff.diff(now);
        var until = moment.duration(count);
        if (until <= 0) {
            return false;
        } else {
            document.getElementById("countdown-kickoff").innerHTML =
                    ((until.days().toString().length < 2 ? '0' + until.days() + ' : ' : until.days() + ' : ')
                    + (until.hours().toString().length < 2 ? '0' + until.hours() + ' : ' : until.hours() + ' : ')
                    + (until.minutes().toString().length < 2 ? '0' + until.minutes() + ' : ' : until.minutes() + ' : ')
                    + (until.seconds().toString().length < 2 ? '0' + until.seconds() : until.seconds()));
        }
    }
</script>
@endpush