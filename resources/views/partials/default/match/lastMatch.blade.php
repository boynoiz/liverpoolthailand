<div class="tab-content nobottommargin clearfix" id="lastMatchPanel">
    <div class="col-xs-4 col-sm-4 col-md-4 team-logo-home">
        <img src="{{ $lastMatch->team_as_home->image_path .'thumb/'. $lastMatch->team_as_home->image_name }}">
        <p class="text-center">{{ $lastMatch->localteam_name }}</p>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 bottommargin-sm center text-team-score">
        <p class="nobottommargin">
            <img class="competition"
                 src="{{ $lastMatch->competition->image_path .'thumb/'. $lastMatch->competition->image_name }}"
                 title="{{ $lastMatch->competition->name }}"></p>
        <p class="nobottommargin">
                        <span class="game-status">
                            {{ $lastMatch->status }}
                        </span>
        </p>
        <p class="nobottommargin">
                        <span class="game-score">
                            {{ $lastMatch->localteam_score }} - {{ $lastMatch->visitorteam_score }}
                        </span>
        </p>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 team-logo-away">
        <img src="{{ $lastMatch->team_as_away->image_path .'thumb/'. $lastMatch->team_as_away->image_name }}">
        <p class="text-center">{{ $lastMatch->visitorteam_name }}</p>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-player-event">
        @if (count($lastMatch->events))
            <div class="col-xs-6 col-sm-6 col-md-6 stayleft">
                @foreach($lastMatch->events as $homeEvent)
                    @if ($homeEvent->team === 'localteam')
                        @if($homeEvent->type === 'yellowcard')
                            <span class="events-icon"><i class="fa fa-square yellowcard" title="Yellow Card"></i></span>
                            <span class="player-yellowcard"> {{ $homeEvent->player . ' &#39;' . $homeEvent->minute }}</span>
                            <br/>
                        @endif
                        @if($homeEvent->type === 'redcard')
                            <span class="events-icon"><i class="fa fa-square redcard" title="Red Card"></i></span>
                            <span class="player-redcard"> {{ $homeEvent->player . ' &#39;' . $homeEvent->minute }}</span>
                            <br/>
                        @endif
                        @if($homeEvent->type === 'yellowred')
                            <span class="events-icon">
                                                <i class="fa fa-square yellowcard"></i>
                                                <i class="fa fa-square yellowred" title="Yellow/Red Card"></i>
                                            </span>
                            <span class="player-yellowred"> {{ $homeEvent->player . ' &#39;' . $homeEvent->minute }}</span>
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
                            <span class="events-icon"><i class="fa fa-square yellowcard" title="Yellow Card"></i></span>
                            <span class="player-yellowcard"> {{ $awayEvent->player . ' &#39;' . $awayEvent->minute }}</span>
                            <br/>
                        @endif
                        @if($awayEvent->type === 'redcard')
                            <span class="events-icon"><i class="fa fa-square redcard" title="Red Card"></i></span>
                            <span class="player-redcard"> {{ $awayEvent->player . ' &#39;' . $awayEvent->minute }}</span>
                            <br/>
                        @endif
                        @if($awayEvent->type === 'yellowred')
                            <span class="events-icon">
                                                <i class="fa fa-square yellowcard"></i>
                                                <i class="fa fa-square yellowred" title="Yellow/Red Card"></i>
                                            </span>
                            <span class="player-yellowred"> {{ $awayEvent->player . ' &#39;' . $awayEvent->minute }}</span>
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