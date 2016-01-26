<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;

/**
 * LTF\FootballMatchEvents
 *
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
 * @property-read \LTF\FootballMatches $EventOfMatches
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
    public function EventOfMatches()
    {
        return $this->belongsTo(FootballMatches::class, 'event_match_id');
    }
}
