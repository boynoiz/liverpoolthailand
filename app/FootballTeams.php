<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;

/**
 * LTF\FootballTeams
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $team_id
 * @property string $team_name
 * @property string $team_shortname
 * @property string $team_venue_name
 * @property string $team_logo
 * @property integer $team_lastmatch
 * @property string $team_nextmatch
 * @property-read \Illuminate\Database\Eloquent\Collection|\LTF\FootballPlayer[] $TeamOfPlayers
 */
class FootballTeams extends Model
{
    /**
     * @var string
     */
    protected $tabale = 'football_teams';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'team_id',
        'team_name',
        'team_shortname'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function TeamOfPlayers()
    {
        return $this->hasMany(FootballPlayer::class, 'team_id');
    }
}
