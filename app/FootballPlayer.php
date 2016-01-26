<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;

/**
 * LTF\FootballPlayer
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\LTF\FootballPLayerStats[] $PlayerOfStats
 * @property-read \LTF\FootballTeams $PlayersOfTeam
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
    public function PlayerOfStats()
    {
        return $this->hasMany(FootballPlayerStats::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function PlayersOfTeam()
    {
        return$this->belongsTo(FootballTeams::class, 'player_team_id');
    }
}
