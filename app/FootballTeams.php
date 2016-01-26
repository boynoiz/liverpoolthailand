<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * LTF\FootballTeams
 *
 * @mixin \Eloquent
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
 * @property-read \Illuminate\Database\Eloquent\Collection|FootballPlayer[] $players
 * @method static Builder|FootballTeams whereId($value)
 * @method static Builder|FootballTeams whereCreatedAt($value)
 * @method static Builder|FootballTeams whereUpdatedAt($value)
 * @method static Builder|FootballTeams whereTeamId($value)
 * @method static Builder|FootballTeams whereTeamName($value)
 * @method static Builder|FootballTeams whereTeamShortname($value)
 * @method static Builder|FootballTeams whereTeamVenueName($value)
 * @method static Builder|FootballTeams whereTeamLogo($value)
 * @method static Builder|FootballTeams whereTeamLastmatch($value)
 * @method static Builder|FootballTeams whereTeamNextmatch($value)
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
    public function players()
    {
        return $this->hasMany(FootballPlayer::class, 'team_id');
    }
}
