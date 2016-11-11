<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * App\FootballStanding
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $comp_id
 * @property string $season
 * @property integer $round
 * @property integer $stage_id
 * @property string $group
 * @property string $country
 * @property integer $team_id
 * @property string $team_name
 * @property string $status
 * @property string $recent_form
 * @property integer $position
 * @property integer $overall_gp
 * @property integer $overall_w
 * @property integer $overall_d
 * @property integer $overall_l
 * @property integer $overall_gs
 * @property integer $overall_ga
 * @property integer $home_gp
 * @property integer $home_w
 * @property integer $home_d
 * @property integer $home_l
 * @property integer $home_gs
 * @property integer $home_ga
 * @property integer $away_gp
 * @property integer $away_w
 * @property integer $away_d
 * @property integer $away_l
 * @property integer $away_gs
 * @property integer $away_ga
 * @property integer $gd
 * @property integer $points
 * @property string $description
 * @method static Builder|FootballStanding whereId($value)
 * @method static Builder|FootballStanding whereCreatedAt($value)
 * @method static Builder|FootballStanding whereUpdatedAt($value)
 * @method static Builder|FootballStanding whereCompId($value)
 * @method static Builder|FootballStanding whereSeason($value)
 * @method static Builder|FootballStanding whereRound($value)
 * @method static Builder|FootballStanding whereStageId($value)
 * @method static Builder|FootballStanding whereGroup($value)
 * @method static Builder|FootballStanding whereCountry($value)
 * @method static Builder|FootballStanding whereTeamId($value)
 * @method static Builder|FootballStanding whereTeamName($value)
 * @method static Builder|FootballStanding whereStatus($value)
 * @method static Builder|FootballStanding whereRecentForm($value)
 * @method static Builder|FootballStanding wherePosition($value)
 * @method static Builder|FootballStanding whereOverallGp($value)
 * @method static Builder|FootballStanding whereOverallW($value)
 * @method static Builder|FootballStanding whereOverallD($value)
 * @method static Builder|FootballStanding whereOverallL($value)
 * @method static Builder|FootballStanding whereOverallGs($value)
 * @method static Builder|FootballStanding whereOverallGa($value)
 * @method static Builder|FootballStanding whereHomeGp($value)
 * @method static Builder|FootballStanding whereHomeW($value)
 * @method static Builder|FootballStanding whereHomeD($value)
 * @method static Builder|FootballStanding whereHomeL($value)
 * @method static Builder|FootballStanding whereHomeGs($value)
 * @method static Builder|FootballStanding whereHomeGa($value)
 * @method static Builder|FootballStanding whereAwayGp($value)
 * @method static Builder|FootballStanding whereAwayW($value)
 * @method static Builder|FootballStanding whereAwayD($value)
 * @method static Builder|FootballStanding whereAwayL($value)
 * @method static Builder|FootballStanding whereAwayGs($value)
 * @method static Builder|FootballStanding whereAwayGa($value)
 * @method static Builder|FootballStanding whereGd($value)
 * @method static Builder|FootballStanding wherePoints($value)
 * @method static Builder|FootballStanding whereDescription($value)
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
        'comp_id',
        'season',
        'round',
        'stage_id',
        'comp_group',
        'country',
        'team_id',
        'team_name',
        'status',
        'recent_form',
        'position',
        'overall_gp',
        'overall_w',
        'overall_d',
        'overall_l',
        'overall_gs',
        'overall_ga',
        'home_gp',
        'home_w',
        'home_d',
        'home_l',
        'home_gs',
        'home_ga',
        'away_gp',
        'away_w',
        'away_d',
        'away_l',
        'away_gs',
        'away_ga',
        'gd',
        'points',
        'description'
    ];
}
