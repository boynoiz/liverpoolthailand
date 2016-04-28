<div class="tabs tabs-bb clearfix" id="gamePanel">
    <ul class="tab-nav clearfix">
        <li><a href="#Match">{{ $Match->timer === 0 ? 'Up Coming' : '<img src="/assets/images/live2.gif"> Live'}}</a></li>
        <li><a href="#lastMatch">Last Match</a></li>
        <li><a href="#table">EPL Table</a></li>
    </ul>
    <div class="tab-container">
        @if(count($Match))
            <div class="tab-content nobottommargin clearfix" id="Match">
                <div class="col-xs-4 col-sm-4 col-md-4 team-logo-home">
                    <img src="{{ $Match->team_as_home->image_path . $Match->team_as_home->image_name }}">
                    <p class="text-center">{{ $Match->localteam_name }}</p>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 center text-team-vs">
                    <p class="nobottommargin"><img class="competition" src="{{ $Match->competition->image_path.'small/'.$Match->competition->image_name }}" title="{{ $Match->competition->name }}"></p>
                    @if($Match->timer === 0)
                        <p class="nobottommargin"><span id="countdown-kickoff" class="coundown-counter" data-date-countdown="{{ Date::createFromFormat('Y-m-d H:i', $Match->formatted_date .' '. $Match->time)->format('Y-m-d H:i:s') }}"></span></p>
                        <p class="nobottommargin"><span class="small-text">Days  :  Hours  :  Minutes  :  Seconds</span></p>
                    @else
                        <p class="nobottommargin"><span id="live-game-timer" class="game-timer">&#39;{{ $Match->timer }}</span></p>
                        <p class="nobottommargin"><span id="live-game-score" class="game-score">{{ $Match->localteam_score }} - {{ $Match->visitorteam_score }}</span></p>
                    @endif
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 team-logo-away">
                    <img src="{{ $Match->team_as_away->image_path . $Match->team_as_away->image_name }}">
                    <p class="text-center">{{ $Match->visitorteam_name }}</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-player-event">
                    @if (count($Match->events))
                        <div class="col-xs-6 col-sm-6 col-md-6 stayleft">
                            @foreach($Match->events as $homeLiveEvent)
                                @if ($homeLiveEvent->team === 'localteam')
                                    @if($homeLiveEvent->type === 'yellowcard')
                                        <span class="yellowcard"><i class="fa fa-square" title="Yellow Card"></i></span>
                                        <span class="player-yellowcard"> {{ $homeLiveEvent->player . ' &#39;' . $homeLiveEvent->minute }}</span>
                                        <br/>
                                    @endif
                                    @if($homeLiveEvent->type === 'redcard')
                                        <span class="redcard"><i class="fa fa-square" title="Red Card"></i></span>
                                        <span class="player-redcard"> {{ $homeLiveEvent->player . ' &#39;' . $homeLiveEvent->minute }}</span>
                                        <br/>
                                    @endif
                                    @if($homeLiveEvent->type === 'goal')
                                        <span><i class="fa fa-soccer-ball-o" title="Goal!"></i></span>
                                        <span class="scorer"> {{ $homeLiveEvent->player . ' &#39;' . $homeLiveEvent->minute }}</span>
                                        @if(!empty($homeLiveEvent->assist))
                                            <span class="assist"> ({{ $homeLiveEvent->assist }})</span>
                                        @endif
                                        <br/>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 stayright">
                            @foreach($Match->events as $awayLiveEvent)
                                @if ($awayLiveEvent->team === 'visitorteam')
                                    @if($awayLiveEvent->type === 'yellowcard')
                                        <span class="yellowcard"><i class="fa fa-square" title="Yellow Card"></i></span>
                                        <span class="player-yellowcard"> {{ $awayLiveEvent->player . ' &#39;' . $awayLiveEvent->minute }}</span>
                                        <br/>
                                    @endif
                                    @if($awayLiveEvent->type === 'redcard')
                                        <span class="redcard"><i class="fa fa-square" title="Red Card"></i></span>
                                        <span class="player-redcard"> {{ $awayLiveEvent->player . ' &#39;' . $awayLiveEvent->minute }}</span>
                                        <br/>
                                    @endif
                                    @if($awayLiveEvent->type === 'goal')
                                        <span><i class="fa fa-soccer-ball-o" title="Goal!"></i></span>
                                        <span class="scorer"> {{ $awayLiveEvent->player . ' &#39;' . $awayLiveEvent->minute }}</span>
                                        @if(!empty($awayLiveEvent->assist))
                                            <span class="assist"> ({{ $awayLiveEvent->assist }})</span>
                                        @endif
                                        <br/>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 center">
                    <span>
                        <small>
                            {{ Date::createFromFormat('Y-m-d', $Match->formatted_date)->format('l j F Y') ?: '-' }}
                            | เวลา {{ $Match->time ?: '-' }} <br/>
                            สนาม {{ $Match->venue ?: '-' }}
                        </small>
                    </span>
                </div>
            </div>
        @endif
        @if(count($lastMatch))
            <div class="tab-content nobottommargin clearfix" id="lastMatch">
                <div class="col-xs-4 col-sm-4 col-md-4 team-logo-home">
                    <img src="{{ $lastMatch->team_as_home->image_path . $lastMatch->team_as_home->image_name }}">
                    <p class="text-center">{{ $lastMatch->localteam_name }}</p>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 bottommargin-sm center text-team-score">
                    <p class="nobottommargin"><img class="competition" src="{{ $lastMatch->competition->image_path.'small/'.$lastMatch->competition->image_name }}" title="{{ $lastMatch->competition->name }}"></p>
                    <p class="nobottommargin"><span class="game-score">{{ $lastMatch->localteam_score }} - {{ $lastMatch->visitorteam_score }}</span></p>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 team-logo-away">
                    <img src="{{ $lastMatch->team_as_away->image_path . $lastMatch->team_as_away->image_name }}">
                    <p class="text-center">{{ $lastMatch->visitorteam_name }}</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-player-event">
                    @if (count($lastMatch->events))
                        <div class="col-xs-6 col-sm-6 col-md-6 stayleft">
                            @foreach($lastMatch->events as $homeEvent)
                                @if ($homeEvent->team === 'localteam')
                                    @if($homeEvent->type === 'yellowcard')
                                        <span class="yellowcard"><i class="fa fa-square" title="Yellow Card"></i></span>
                                        <span class="player-yellowcard"> {{ $homeEvent->player . ' &#39;' . $homeEvent->minute }}</span>
                                        <br/>
                                    @endif
                                    @if($homeEvent->type === 'redcard')
                                        <span class="redcard"><i class="fa fa-square" title="Red Card"></i></span>
                                        <span class="player-redcard"> {{ $homeEvent->player . ' &#39;' . $homeEvent->minute }}</span>
                                        <br/>
                                    @endif
                                    @if($homeEvent->type === 'goal')
                                        <span><i class="fa fa-soccer-ball-o" title="Goal!"></i></span>
                                        <span class="scorer"> {{ $homeEvent->player . ' &#39;' . $homeEvent->minute }}</span>
                                        @if(!empty($homeEvent->assist))
                                            <span class="assist"> ({{ $homeEvent->assist }})</span>
                                        @endif
                                        <br/>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 stayright">
                            @foreach($lastMatch->events as $awayEvent)
                                @if ($awayEvent->team === 'visitorteam')
                                    @if($awayEvent->type === 'yellowcard')
                                        <span class="yellowcard"><i class="fa fa-square" title="Yellow Card"></i></span>
                                        <span class="player-yellowcard"> {{ $awayEvent->player . ' &#39;' . $awayEvent->minute }}</span>
                                        <br/>
                                    @endif
                                    @if($awayEvent->type === 'redcard')
                                        <span class="redcard"><i class="fa fa-square" title="Red Card"></i></span>
                                        <span class="player-redcard"> {{ $awayEvent->player . ' &#39;' . $awayEvent->minute }}</span>
                                        <br/>
                                    @endif
                                    @if($awayEvent->type === 'goal')
                                        <span><i class="fa fa-soccer-ball-o" title="Goal!"></i></span>
                                        <span class="scorer"> {{ $awayEvent->player . ' &#39;' . $awayEvent->minute }}</span>
                                        @if(!empty($awayEvent->assist))
                                            <span class="assist"> ({{ $awayEvent->assist }})</span>
                                        @endif
                                        <br/>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 center">
                        <span>
                            <small>
                                {{ Date::createFromFormat('Y-m-d', $lastMatch->formatted_date)->format('l j F Y') ?: '-' }}
                                | เวลา {{ $lastMatch->time ?: '-' }} <br/>
                                สนาม {{ $lastMatch->venue ?: '-' }}
                            </small>
                        </span>
                </div>
            </div>
        @endif
        @if(count($standing))
            <div class="tab-content clearfix" id="table">

                <div class="table-responsive">
                    <table class="table table-no-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Position</th>
                            <th>Team</th>
                            <th>Played</th>
                            <th>GD</th>
                            <th>Points</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($standing as $table)
                        <tr {{ $table->team_id === 9249 ? 'class=liverpool' : ''}}>
                            <td>{{ $table->position }}</td>
                            <td>{{ $table->team_name }}</td>
                            <td>{{ $table->overall_gp }}</td>
                            <td>{{ $table->gd }}</td>
                            <td>{{ $table->points }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
@push('foot-scripts')
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>--}}
<script type="text/javascript">
    setInterval(times, 1000);

    function times() {
        var now = moment();
        var kickoff = moment($('#countdown-kickoff').data('date-countdown'), "YYYY-MM-DD h:mm:ss");
        var count = kickoff.diff(now);
        var until = moment.duration(count);
        document.getElementById("countdown-kickoff").innerHTML =
                ((until.days() === 0 ? '00 : ' : '0' + until.days() + ' : ')
                + (until.hours().toString().length < 2 ? '0' + until.hours()  + ' : ' : until.hours() + ' : ')
                + (until.minutes().toString().length < 2 ? '0' + until.minutes() + ' : ' : until.minutes() + ' : ')
                + (until.seconds().toString().length < 2 ? '0' + until.seconds() : until.seconds()));
    }
</script>
@endpush