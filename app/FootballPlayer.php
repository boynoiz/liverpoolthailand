<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * App\FootballPlayer
 *
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FootballPLayerStats[] $stats
 * @property-read \App\FootballTeams $team
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
