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
 * @property integer $match_id
 * @property string $type
 * @property integer $minute
 * @property integer $extra_min
 * @property string $team
 * @property integer $player_id
 * @property string $player
 * @property integer $assist_id
 * @property string $assist
 * @property string $result
 * @property-read FootballMatches $match
 * @method static Builder|FootballMatchEvents whereId($value)
 * @method static Builder|FootballMatchEvents whereCreatedAt($value)
 * @method static Builder|FootballMatchEvents whereUpdatedAt($value)
 * @method static Builder|FootballMatchEvents whereEventId($value)
 * @method static Builder|FootballMatchEvents whereMatchId($value)
 * @method static Builder|FootballMatchEvents whereType($value)
 * @method static Builder|FootballMatchEvents whereMinute($value)
 * @method static Builder|FootballMatchEvents whereExtraMin($value)
 * @method static Builder|FootballMatchEvents whereTeam($value)
 * @method static Builder|FootballMatchEvents wherePlayerId($value)
 * @method static Builder|FootballMatchEvents wherePlayer($value)
 * @method static Builder|FootballMatchEvents whereAssistId($value)
 * @method static Builder|FootballMatchEvents whereAssist($value)
 * @method static Builder|FootballMatchEvents whereResult($value)
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
        'match_id',
        'type',
        'minute',
        'extra_min',
        'team',
        'player_id',
        'player',
        'assist_id',
        'assist',
        'result'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function match()
    {
        return $this->belongsTo(FootballMatches::class, 'match_id');
    }
}
