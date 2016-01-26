<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;

/**
 * LTF\FootballStanding
 *
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
