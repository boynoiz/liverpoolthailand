<div class="col-xs-4 col-sm-4 col-md-4 team-logo-home">
    <img v-bind:src="match.team_as_home.image_path + 'thumb/' + match.team_as_home.image_name">
    <p class="text-center">@{{ match.localteam_name }}</p>
</div>
<div class="col-xs-4 col-sm-4 col-md-4 center text-team-vs">
    <p class="nobottommargin">
        <img v-bind:src="match.competition.image_path + 'thumb/' + match.competition.image_name" class="competition" title="@{{ match.competition.name }}">
    </p>
    <p class="nobottommargin" v-if="(match.status > 0 && match.timer > 0) || match.status === 'HT'">
        <span v-if="match.timer === 0 && match.status === 'HT'" id="live-game-timer" class="game-timer">
            @{{ match.status }}
        </span>
        <span v-else id="live-game-timer" class="game-timer" transition="blink">
            &#39;@{{ match.timer }}
        </span>
        <br/>
        <span id="live-game-score" class="game-score">
            @{{ match.localteam_score }} - @{{ match.visitorteam_score }}
        </span>
    </p>
    <p class="nobottommargin" v-else>
        <span id="countdown-kickoff"
              class="coundown-counter"
              data-date-countdown="@{{ match.formatted_date }} @{{ match.time }}">
        </span><br/>
        <span class="small-text">Days  :  Hours  :  Minutes  :  Seconds</span>
    </p>
</div>
<div class="col-xs-4 col-sm-4 col-md-4 team-logo-away">
    <img v-bind:src="match.team_as_away.image_path + 'thumb/' + match.team_as_away.image_name">
    <p class="text-center">@{{ match.visitorteam_name }}</p>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-player-event">
    <div class="col-xs-6 col-sm-6 col-md-6 stayleft">
        <div v-for="event in match.events | filterBy 'localteam' in 'team'">
            <div v-show="event.type === 'yellowcard'">
                <span class="events-icon" ><i class="fa fa-square yellowcard" title="Yellow Card"></i></span>
                <span class="player-yellowcard"> @{{ event.player }} &#39;@{{ event.minute }}</span>
            </div>
            <div v-show="event.type === 'redcard'">
                <span class="events-icon"><i class="fa fa-square redcard" title="Red Card"></i></span>
                <span class="player-redcard"> @{{ event.player }} &#39;@{{ event.minute }}</span>
            </div>
            <div v-show="event.type === 'yellowred'">
                <span class="events-icon">
                    <i class="fa fa-square yellowcard"></i>
                    <i class="fa fa-square fa-rotate-45 yellowred" title="Yellow/Red Card"></i>
                    <span class="player-yellowcard"> @{{ event.player }} &#39;@{{ event.minute }}</span>
                </span>
            </div>
            <div v-show="event.type === 'goal'">
                <span><i class="fa fa-soccer-ball-o" title="Goal!"></i></span>
                <span class="scorer"> @{{ event.player }} &#39;@{{ event.minute }}</span>
                <span class="assist" v-show="event.assist"> (@{{ event.assist }})</span>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 stayright">
        <div v-for="event in match.events | filterBy 'visitorteam' in 'team'">
            <div v-show="event.type === 'yellowcard'">
                <span class="events-icon" ><i class="fa fa-square yellowcard" title="Yellow Card"></i></span>
                <span class="player-yellowcard"> @{{ event.player }} &#39;@{{ event.minute }}</span>
            </div>
            <div v-show="event.type === 'redcard'">
                <span class="events-icon"><i class="fa fa-square redcard" title="Red Card"></i></span>
                <span class="player-redcard"> @{{ event.player }} &#39;@{{ event.minute }}</span>
            </div>
            <div v-show="event.type === 'yellowred'">
                <span class="events-icon">
                    <i class="fa fa-square yellowcard"></i>
                    <i class="fa fa-square fa-rotate-45 yellowred" title="Yellow/Red Card"></i>
                    <span class="player-yellowcard"> @{{ event.player }} &#39;@{{ event.minute }}</span>
                </span>
            </div>
            <div v-show="event.type === 'goal'">
                <span><i class="fa fa-soccer-ball-o" title="Goal!"></i></span>
                <span class="scorer"> @{{ event.player }} &#39;@{{ event.minute }}</span>
                <span class="assist" v-show="event.assist"> (@{{ event.assist }})</span>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12"></div>
<div class="col-xs-12 col-sm-12 col-md-12 center">
    <span>
        <small>
            @{{ match.formatted_date | humanReadableTime }}
            | เวลา @{{ match.time }} <br/>
            สนาม @{{ match.venue }}
        </small>
    </span>
</div>
