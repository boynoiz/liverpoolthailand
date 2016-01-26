<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * LTF\FootballStanding
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $stand_id
 * @property integer $stand_competition_id
 * @property string $stand_season
 * @property integer $stand_round
 * @property integer $stand_stage_id
 * @property string $stand_group
 * @property string $stand_country
 * @property integer $stand_team_id
 * @property string $stand_team_name
 * @property string $stand_status
 * @property string $stand_recent_form
 * @property integer $stand_position
 * @property integer $stand_overall_gp
 * @property integer $stand_overall_w
 * @property integer $stand_overall_d
 * @property integer $stand_overall_l
 * @property integer $stand_overall_gs
 * @property integer $stand_overall_ga
 * @property integer $stand_home_gp
 * @property integer $stand_home_w
 * @property integer $stand_home_d
 * @property integer $stand_home_l
 * @property integer $stand_home_gs
 * @property integer $stand_home_ga
 * @property integer $stand_away_gp
 * @property integer $stand_away_w
 * @property integer $stand_away_d
 * @property integer $stand_away_l
 * @property integer $stand_away_gs
 * @property integer $stand_away_ga
 * @property integer $stand_gd
 * @property integer $stand_points
 * @property string $stand_desc
 * @method static Builder|FootballStanding whereId($value)
 * @method static Builder|FootballStanding whereCreatedAt($value)
 * @method static Builder|FootballStanding whereUpdatedAt($value)
 * @method static Builder|FootballStanding whereStandId($value)
 * @method static Builder|FootballStanding whereStandCompetitionId($value)
 * @method static Builder|FootballStanding whereStandSeason($value)
 * @method static Builder|FootballStanding whereStandRound($value)
 * @method static Builder|FootballStanding whereStandStageId($value)
 * @method static Builder|FootballStanding whereStandGroup($value)
 * @method static Builder|FootballStanding whereStandCountry($value)
 * @method static Builder|FootballStanding whereStandTeamId($value)
 * @method static Builder|FootballStanding whereStandTeamName($value)
 * @method static Builder|FootballStanding whereStandStatus($value)
 * @method static Builder|FootballStanding whereStandRecentForm($value)
 * @method static Builder|FootballStanding whereStandPosition($value)
 * @method static Builder|FootballStanding whereStandOverallGp($value)
 * @method static Builder|FootballStanding whereStandOverallW($value)
 * @method static Builder|FootballStanding whereStandOverallD($value)
 * @method static Builder|FootballStanding whereStandOverallL($value)
 * @method static Builder|FootballStanding whereStandOverallGs($value)
 * @method static Builder|FootballStanding whereStandOverallGa($value)
 * @method static Builder|FootballStanding whereStandHomeGp($value)
 * @method static Builder|FootballStanding whereStandHomeW($value)
 * @method static Builder|FootballStanding whereStandHomeD($value)
 * @method static Builder|FootballStanding whereStandHomeL($value)
 * @method static Builder|FootballStanding whereStandHomeGs($value)
 * @method static Builder|FootballStanding whereStandHomeGa($value)
 * @method static Builder|FootballStanding whereStandAwayGp($value)
 * @method static Builder|FootballStanding whereStandAwayW($value)
 * @method static Builder|FootballStanding whereStandAwayD($value)
 * @method static Builder|FootballStanding whereStandAwayL($value)
 * @method static Builder|FootballStanding whereStandAwayGs($value)
 * @method static Builder|FootballStanding whereStandAwayGa($value)
 * @method static Builder|FootballStanding whereStandGd($value)
 * @method static Builder|FootballStanding whereStandPoints($value)
 * @method static Builder|FootballStanding whereStandDesc($value)
 */
class FootballStanding extends Model
{
    /**
     * @var string
     */
    protected $table = 'football_standings';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'stand_id',
        'stand_competition_id',
        'stand_season_id',
        'stand_season_name',
        'stand_round',
        'stand_stage_id',
        'stand_country',
        'stand_overall_d',
        'stand_overall_l',
        'stand_overall_gs',
        'stand_overall_ga',
        'stand_home_gp',
        'stand_home_w',
        'stand_home_d',
        'stand_home_l',
        'stand_home_gs',
        'stand_home_ga',
        'stand_away_gp',
        'stand_away_w',
        'stand_away_d',
        'stand_away_l',
        'stand_away_gs',
        'stand_away_ga',
        'stand_gd',
        'stand_points'
    ];
}
