<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * App\FootballTeams
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
 * @property boolean $is_national
 * @property string $shortname
 * @property string $country
 * @property string $founded
 * @property string $leagues
 * @property integer $venue_id
 * @property string $venue_name
 * @property string $venue_surface
 * @property string $venue_address
 * @property string $venue_city
 * @property integer $venue_capacity
 * @property integer $coach_id
 * @property string $coach_name
 * @property integer $update_by
 * @property-read \App\FootballTeamStats $statistics
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\FootballMatches[] $matches
 * @method static \Illuminate\Database\Query\Builder|\App\FootballTeams whereIsNational($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FootballTeams whereCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FootballTeams whereFounded($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FootballTeams whereLeagues($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FootballTeams whereVenueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FootballTeams whereVenueSurface($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FootballTeams whereVenueAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FootballTeams whereVenueCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FootballTeams whereVenueCapacity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FootballTeams whereCoachId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FootballTeams whereCoachName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FootballTeams whereUpdateBy($value)
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
