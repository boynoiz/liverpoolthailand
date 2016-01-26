<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;

/**
 * LTF\Language
 *
 * @property integer $id
 * @property string $title
 * @property string $flag
 * @property string $code
 * @property string $site_title
 * @property string $site_description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\LTF\Category[] $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|\LTF\Page[] $pages
 * @method static \Illuminate\Database\Query\Builder|\LTF\Language whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Language whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Language whereFlag($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Language whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Language whereSiteTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Language whereSiteDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Language whereUpdatedAt($value)
 */
class Language extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'flag', 'site_description', 'site_title', 'title'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany('LTF\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany('LTF\Page');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function articles()
    {
        return $this->hasManyThrough('LTF\Article', 'LTF\Category');
    }
}
