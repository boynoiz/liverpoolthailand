<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * LTF\FootballPLayerStats
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $player_id
 * @property integer $player_competition_id
 * @property string $player_season
 * @property string $player_shortname
 * @property integer $player_goal
 * @property integer $player_assist
 * @property-read FootballPlayer $player
 * @method static Builder|FootballPlayerStats whereId($value)
 * @method static Builder|FootballPlayerStats whereCreatedAt($value)
 * @method static Builder|FootballPlayerStats whereUpdatedAt($value)
 * @method static Builder|FootballPlayerStats wherePlayerId($value)
 * @method static Builder|FootballPlayerStats wherePlayerCompetitionId($value)
 * @method static Builder|FootballPlayerStats wherePlayerSeason($value)
 * @method static Builder|FootballPlayerStats wherePlayerShortname($value)
 * @method static Builder|FootballPlayerStats wherePlayerGoal($value)
 * @method static Builder|FootballPlayerStats wherePlayerAssist($value)
 */
class FootballPlayerStats extends Model
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
        'comp_id',
        'season_id',
        'player_goals',
        'player_assists'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function player()
    {
        return $this->belongsTo(FootballPlayer::class, 'id');
    }
}
