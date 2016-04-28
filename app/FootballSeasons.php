<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * LTF\FootballSeasons
 *
 * @mixin \Eloquent
 * @method static Builder|FootballSeasons whereId($value)
 * @method static Builder|FootballSeasons whereSeasonName($value)
 * @method static Builder|FootballSeasons whereSeasonStartdate($value)
 * @method static Builder|FootballSeasons whereSeasonEnddate($value)
 */
class FootballSeasons extends Model
{
    /**
     * @var string
     */
    protected $table = 'football_seeasons';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'season_name',
    ];
}
