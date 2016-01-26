<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;

/**
 * LTF\FootballSeasons
 *
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
        'season_startdate',
        'season_enddate'
    ];
}
