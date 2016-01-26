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
 * @method static Builder|FootballPLayerStats whereId($value)
 * @method static Builder|FootballPLayerStats whereCreatedAt($value)
 * @method static Builder|FootballPLayerStats whereUpdatedAt($value)
 * @method static Builder|FootballPLayerStats wherePlayerId($value)
 * @method static Builder|FootballPLayerStats wherePlayerCompetitionId($value)
 * @method static Builder|FootballPLayerStats wherePlayerSeason($value)
 * @method static Builder|FootballPLayerStats wherePlayerShortname($value)
 * @method static Builder|FootballPLayerStats wherePlayerGoal($value)
 * @method static Builder|FootballPLayerStats wherePlayerAssist($value)
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
    public function player()
    {
        return $this->belongsTo(FootballPlayer::class, 'id');
    }
}
