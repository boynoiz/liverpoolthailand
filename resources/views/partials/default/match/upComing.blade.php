<div class="tab-content nobottommargin clearfix" id="upcomingMatch">
    <div class="col-xs-4 col-sm-4 col-md-4 team-logo-home">
        <img src="{{ $Match->team_as_home->image_path .'thumb/'. $Match->team_as_home->image_name }}">
        <p class="text-center">{{ $Match->localteam_name }}</p>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 center text-team-vs">
        <p class="nobottommargin">
            <img class="competition"
                 src="{{ $Match->competition->image_path.'thumb/'.$Match->competition->image_name }}"
                 title="{{ $Match->competition->name }}">
        </p>
        @if (($Match->status > 0 and $Match->timer > 0) or $Match->status === 'HT')
            <p class="nobottommargin">
                <span id="live-game-timer"
                      class="game-timer">{!! $Match->timer === 0 ? $Match->status : '&#39;' . $Match->timer !!}</span>
            </p>
            <p class="nobottommargin">
                            <span id="live-game-score" class="game-score">
                                {{ $Match->localteam_score }} - {{ $Match->visitorteam_score }}
                            </span>
            </p>
        @else
            <p class="nobottommargin">
                            <span id="countdown-kickoff"
                                  class="coundown-counter"
                                  data-date-countdown="{{ Date::createFromFormat('Y-m-d H:i', $Match->formatted_date .' '. $Match->time)->format('Y-m-d H:i:s') }}"></span>
            </p>
            <p class="nobottommargin"><span class="small-text">Days  :  Hours  :  Minutes  :  Seconds</span></p>
        @endif
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 team-logo-away">
        <img src="{{ $Match->team_as_away->image_path .'thumb/'. $Match->team_as_away->image_name }}">
        <p class="text-center">{{ $Match->visitorteam_name }}</p>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-player-event">
        @if (count($Match->events))
            <div class="col-xs-6 col-sm-6 col-md-6 stayleft">
                @foreach($Match->events as $homeLiveEvent)
                    @if ($homeLiveEvent->team === 'localteam')
                        @if($homeLiveEvent->type === 'yellowcard')
                            <span class="events-icon"><i class="fa fa-square yellowcard" title="Yellow Card"></i></span>
                            <span class="player-yellowcard"> {{ $homeLiveEvent->player . ' &#39;' . $homeLiveEvent->minute }}</span>
                            <br/>
                        @endif
                        @if($homeLiveEvent->type === 'redcard')
                            <span class="events-icon"><i class="fa fa-square redcard" title="Red Card"></i></span>
                            <span class="player-redcard"> {{ $homeLiveEvent->player . ' &#39;' . $homeLiveEvent->minute }}</span>
                            <br/>
                        @endif
                        @if($homeLiveEvent->type === 'yellowred')
                            <span class="events-icon">
                                            <i class="fa fa-square yellowcard"></i>
                                            <i class="fa fa-square fa-rotate-45 yellowred" title="Yellow/Red Card"></i>
                                        </span>
                            <span class="player-yellowcard"> {{ $homeLiveEvent->player . ' &#39;' . $homeLiveEvent->minute }}</span>
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
                            <span class="events-icon"><i class="fa fa-square yellowcard" title="Yellow Card"></i></span>
                            <span class="player-yellowcard"> {{ $awayLiveEvent->player . ' &#39;' . $awayLiveEvent->minute }}</span>
                            <br/>
                        @endif
                        @if($awayLiveEvent->type === 'redcard')
                            <span class="events-icon"><i class="fa fa-square redcard" title="Red Card"></i></span>
                            <span class="player-redcard"> {{ $awayLiveEvent->player . ' &#39;' . $awayLiveEvent->minute }}</span>
                            <br/>
                        @endif
                        @if($awayLiveEvent->type === 'yellowred')
                            <span class="events-icon">
                                            <i class="fa fa-square yellowcard"></i></span>
                            <i class="fa fa-square yellowred" title="Yellow/Red Card"></i>
                            <span class="player-yellow"> {{ $awayLiveEvent->player . ' &#39;' . $awayLiveEvent->minute }}</span>
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