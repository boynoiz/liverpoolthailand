<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;

/**
 * LTF\FootballPLayerStats
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $player_id
 * @property integer $player_competition_id
 * @property string $player_season
 * @property string $player_shortname
 * @property integer $player_goal
 * @property integer $player_assist
 * @property-read \LTF\FootballPlayer $StatsPlayer
 */
class FootballPLayerStats extends Model
{
    /**
     * @var string
     */
    protected $table = 'football_player_stat';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'player_id',
        'player_competition_id',
        'player_season',
        'player_shortname'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function StatsPlayer()
    {
        return $this->belongsTo(FootballPlayer::class, 'id');
    }
}
