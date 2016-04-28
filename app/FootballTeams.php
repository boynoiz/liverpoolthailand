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
 * @property string $name
 * @property string $image_path
 * @property string $image_name
 * @property string $stadium_name
 * @property string $city_name
 * @property string $country_code
 * @property string $detail
 * @property-read \Illuminate\Database\Eloquent\Collection|FootballPlayer[] $players
 * @method static Builder|FootballTeams whereId($value)
 * @method static Builder|FootballTeams whereCreatedAt($value)
 * @method static Builder|FootballTeams whereUpdatedAt($value)
 * @method static Builder|FootballTeams whereTeamId($value)
 * @method static Builder|FootballTeams whereName($value)
 * @method static Builder|FootballTeams whereShortname($value)
 * @method static Builder|FootballTeams whereVenueName($value)
 * @method static Builder|FootballTeams whereImagePath($value)
 * @method static Builder|FootballTeams whereImageName($value)
 * @method static Builder|FootballTeams whereDetail($value)
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
        'is_national',
        'name',
        'shortname',
        'image_path',
        'image_name',
        'country',
        'founded',
        'leagues',
        'venue_id',
        'venue_name',
        'venue_surface',
        'venue_address',
        'venue_city',
        'venue_capacity',
        'coach_id',
        'coach_name',
        'detail'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players()
    {
        return $this->hasMany(FootballPlayer::class, 'team_id');
    }

    public function statistics()
    {
        return $this->belongsTo(FootballTeamStats::class, 'team_id');
    }

    public function matches()
    {
        return $this->belongsToMany(FootballMatches::class, 'localteam_id', 'visitorteam_id');
    }
}
