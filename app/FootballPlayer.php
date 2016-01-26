<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * LTF\FootballPlayer
 *
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\LTF\FootballPLayerStats[] $stats
 * @property-read \LTF\FootballTeams $team
 * @method static Builder|FootballPlayer whereId($value)
 * @method static Builder|FootballPlayer wherePlayerStatId($value)
 * @method static Builder|FootballPlayer wherePlayerTeamId($value)
 * @method static Builder|FootballPlayer whereShortname($value)
 */
class FootballPlayer extends Model
{
    /**
     * @var string
     */
    protected $table = 'football_player';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'player_id',
        'player_stat_id',
        'player_team_id',
        'player_shortname'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stats()
    {
        return $this->hasMany(FootballPlayerStats::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return$this->belongsTo(FootballTeams::class, 'player_team_id');
    }
}
