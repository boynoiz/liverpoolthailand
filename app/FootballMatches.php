<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
/**
 * LTF\FootballMatches
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $match_id
 * @property integer $match_static_id
 * @property integer $match_comp_id
 * @property integer $match_event_id
 * @property string $match_date
 * @property integer $match_formatted_date
 * @property string $match_season
 * @property string $match_week
 * @property string $match_venue
 * @property integer $match_venue_id
 * @property string $match_venue_city
 * @property string $match_status
 * @property integer $match_timer
 * @property string $match_time
 * @property integer $match_commentary_id
 * @property integer $match_localteam_id
 * @property string $match_localteam_name
 * @property boolean $match_localteam_score
 * @property integer $match_visitorteam_id
 * @property string $match_visitorteam_name
 * @property boolean $match_visitorteam_score
 * @property string $match_ht_score
 * @property string $match_ft_score
 * @property string $match_et_score
 * @property-read \Illuminate\Database\Eloquent\Collection|FootballMatchEvents[] $events
 * @method static Builder|FootballMatches whereId($value)
 * @method static Builder|FootballMatches whereCreatedAt($value)
 * @method static Builder|FootballMatches whereUpdatedAt($value)
 * @method static Builder|FootballMatches whereMatchId($value)
 * @method static Builder|FootballMatches whereMatchStaticId($value)
 * @method static Builder|FootballMatches whereMatchCompId($value)
 * @method static Builder|FootballMatches whereMatchEventId($value)
 * @method static Builder|FootballMatches whereMatchDate($value)
 * @method static Builder|FootballMatches whereMatchFormattedDate($value)
 * @method static Builder|FootballMatches whereMatchSeason($value)
 * @method static Builder|FootballMatches whereMatchWeek($value)
 * @method static Builder|FootballMatches whereMatchVenue($value)
 * @method static Builder|FootballMatches whereMatchVenueId($value)
 * @method static Builder|FootballMatches whereMatchVenueCity($value)
 * @method static Builder|FootballMatches whereMatchStatus($value)
 * @method static Builder|FootballMatches whereMatchTimer($value)
 * @method static Builder|FootballMatches whereMatchTime($value)
 * @method static Builder|FootballMatches whereMatchCommentaryId($value)
 * @method static Builder|FootballMatches whereMatchLocalteamId($value)
 * @method static Builder|FootballMatches whereMatchLocalteamName($value)
 * @method static Builder|FootballMatches whereMatchLocalteamScore($value)
 * @method static Builder|FootballMatches whereMatchVisitorteamId($value)
 * @method static Builder|FootballMatches whereMatchVisitorteamName($value)
 * @method static Builder|FootballMatches whereMatchVisitorteamScore($value)
 * @method static Builder|FootballMatches whereMatchHtScore($value)
 * @method static Builder|FootballMatches whereMatchFtScore($value)
 * @method static Builder|FootballMatches whereMatchEtScore($value)
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
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'match_id',
        'match_static_id',
        'match_comp_id',
        'match_event_id',
        'match_date',
        'match_formatted_date',
        'match_season',
        'match_week',
        'match_venue',
        'match_venue_id',
        'match_venue_city',
        'match_timer',
        'match_time',
        'match_localteam_id',
        'match_localteam_name',
        'match_localteam_score',
        'match_visitorteam_id',
        'match_visitorteam_name',
        'match_visitorteam_score',
        'match_ht_score',
        'match_ft_score',
        'match_et_score'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(FootballMatchEvents::class, 'match_id');
    }
}
