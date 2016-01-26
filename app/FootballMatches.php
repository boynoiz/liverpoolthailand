<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;

/**
 * LTF\FootballMatches
 *
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\LTF\FootballMatchEvents[] $MatchOfEvents
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
    public function MatchOfEvents()
    {
        return $this->hasMany(FootballMatchEvents::class, 'match_id');
    }
}
