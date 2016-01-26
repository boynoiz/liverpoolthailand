<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * LTF\FootballCompetition
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $comp_id
 * @property string $comp_name
 * @property string $comp_region
 * @property string $comp_logo
 * @property integer $comp_season_id
 * @property string $comp_season_name
 * @property integer $comp_lastmatch_id
 * @property integer $comp_nextmatch_id
 * @method static Builder|FootballCompetition whereId($value)
 * @method static Builder|FootballCompetition whereCreatedAt($value)
 * @method static Builder|FootballCompetition whereUpdatedAt($value)
 * @method static Builder|FootballCompetition whereCompId($value)
 * @method static Builder|FootballCompetition whereCompName($value)
 * @method static Builder|FootballCompetition whereCompRegion($value)
 * @method static Builder|FootballCompetition whereCompLogo($value)
 * @method static Builder|FootballCompetition whereCompSeasonId($value)
 * @method static Builder|FootballCompetition whereCompSeasonName($value)
 * @method static Builder|FootballCompetition whereCompLastmatchId($value)
 * @method static Builder|FootballCompetition whereCompNextmatchId($value)
 */

class FootballCompetition extends Model
{
    /**
     * @var string
     */
    protected $table = 'football_competition';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'comp_id',
        'comp_name',
        'comp_season'
    ];
}
