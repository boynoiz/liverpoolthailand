<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * LTF\FootballMatchEvents
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $event_id
 * @property integer $event_match_id
 * @property string $event_type
 * @property integer $event_minute
 * @property string $event_team
 * @property string $event_player
 * @property integer $event_player_id
 * @property string $event_result
 * @property-read FootballMatches $match
 * @method static Builder|FootballMatchEvents whereId($value)
 * @method static Builder|FootballMatchEvents whereCreatedAt($value)
 * @method static Builder|FootballMatchEvents whereUpdatedAt($value)
 * @method static Builder|FootballMatchEvents whereEventId($value)
 * @method static Builder|FootballMatchEvents whereEventMatchId($value)
 * @method static Builder|FootballMatchEvents whereEventType($value)
 * @method static Builder|FootballMatchEvents whereEventMinute($value)
 * @method static Builder|FootballMatchEvents whereEventTeam($value)
 * @method static Builder|FootballMatchEvents whereEventPlayer($value)
 * @method static Builder|FootballMatchEvents whereEventPlayerId($value)
 * @method static Builder|FootballMatchEvents whereEventResult($value)
 */
class FootballMatchEvents extends Model
{
    /**
     * @var string
     */
    protected $table = 'football_match_events';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'event_id',
        'event_match_id',
        'event_type',
        'event_minute',
        'event_team',
        'event_player',
        'event_player_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function match()
    {
        return $this->belongsTo(FootballMatches::class, 'event_match_id');
    }
}
