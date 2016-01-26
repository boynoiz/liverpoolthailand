<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;

/**
 * LTF\Setting
 *
 * @property integer $id
 * @property string $logo
 * @property string $email
 * @property string $facebook
 * @property string $twitter
 * @property string $disqus_shortname
 * @property string $analytics_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \LTF\Language $language
 * @method static \Illuminate\Database\Query\Builder|\LTF\Setting whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Setting whereLogo($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Setting whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Setting whereFacebook($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Setting whereTwitter($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Setting whereDisqusShortname($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Setting whereAnalyticsId($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\LTF\Setting whereUpdatedAt($value)
 */
class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['analytics_id', 'disqus_shortname', 'email', 'facebook', 'logo', 'twitter'];
}
