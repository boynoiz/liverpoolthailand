<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * App\FootballMatches
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $match_id
 * @property integer $comp_id
 * @property integer $formatted_date
 * @property string $season
 * @property string $week
 * @property string $venue
 * @property integer $venue_id
 * @property string $venue_city
 * @property string $status
 * @property integer $timer
 * @property string $time
 * @property integer $localteam_id
 * @property string $localteam_name
 * @property boolean $localteam_score
 * @property integer $visitorteam_id
 * @property string $visitorteam_name
 * @property boolean $visitorteam_score
 * @property string $ht_score
 * @property string $ft_score
 * @property string $et_score
 * @property string $penalty_local
 * @property string $penalty_visitor
 * @property-read \Illuminate\Database\Eloquent\Collection|FootballMatchEvents[] $events
 * @method static Builder|FootballMatches whereId($value)
 * @method static Builder|FootballMatches whereCreatedAt($value)
 * @method static Builder|FootballMatches whereUpdatedAt($value)
 * @method static Builder|FootballMatches whereMatchId($value)
 * @method static Builder|FootballMatches whereCompId($value)
 * @method static Builder|FootballMatches whereFormattedDate($value)
 * @method static Builder|FootballMatches whereSeason($value)
 * @method static Builder|FootballMatches whereWeek($value)
 * @method static Builder|FootballMatches whereVenue($value)
 * @method static Builder|FootballMatches whereVenueId($value)
 * @method static Builder|FootballMatches whereVenueCity($value)
 * @method static Builder|FootballMatches whereStatus($value)
 * @method static Builder|FootballMatches whereTimer($value)
 * @method static Builder|FootballMatches whereTime($value)
 * @method static Builder|FootballMatches whereLocalteamId($value)
 * @method static Builder|FootballMatches whereLocalteamName($value)
 * @method static Builder|FootballMatches whereLocalteamScore($value)
 * @method static Builder|FootballMatches whereVisitorteamId($value)
 * @method static Builder|FootballMatches whereVisitorteamName($value)
 * @method static Builder|FootballMatches whereVisitorteamScore($value)
 * @method static Builder|FootballMatches whereHtScore($value)
 * @method static Builder|FootballMatches whereFtScore($value)
 * @method static Builder|FootballMatches whereEtScore($value)
 * @method static Builder|FootballMatches wherePenaltyLocal($value)
 * @method static Builder|FootballMatches wherePenaltyVisitor($value)
 */

class FootballMatches extends Model
{
    /**
     * @var string
     */
    protected $table = 'football_matches';

    /**
     * @var bool
     */
//    protected $dates = ['formatted_date'];

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'match_id',
        'comp_id',
        'formatted_date',
        'season',
        'week',
        'venue',
        'venue_id',
        'venue_city',
        'status',
        'timer',
        'time',
        'localteam_id',
        'localteam_name',
        'localteam_score',
        'visitorteam_id',
        'visitorteam_name',
        'visitorteam_score',
        'ht_score',
        'ft_score',
        'et_score',
        'penalty_local',
        'penalty_visitor'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(FootballMatchEvents::class, 'match_id', 'match_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function competition()
    {
        return $this->belongsTo(FootballCompetition::class, 'comp_id', 'comp_id')->select(['comp_id', 'name', 'image_path', 'image_name']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team_as_home()
    {
        return $this->belongsTo(FootballTeams::class, 'localteam_id', 'team_id')->select(['team_id', 'name', 'image_path', 'image_name']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team_as_away()
    {
        return $this->belongsTo(FootballTeams::class, 'visitorteam_id', 'team_id')->select(['team_id', 'name', 'image_path', 'image_name']);
    }
}
