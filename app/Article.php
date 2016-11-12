<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Base\SluggableModel;
use Illuminate\Database\Query\Builder;

/**
 * App\Article
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $published_at
 * @property string $description
 * @property integer $read
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Category $category
 * @method static Builder|Article whereId($value)
 * @method static Builder|Article whereCategoryId($value)
 * @method static Builder|Article whereTitle($value)
 * @method static Builder|Article whereSlug($value)
 * @method static Builder|Article whereContent($value)
 * @method static Builder|Article wherePublishedAt($value)
 * @method static Builder|Article whereDescription($value)
 * @method static Builder|Article whereRead($value)
 * @method static Builder|Article whereCreatedAt($value)
 * @method static Builder|Article whereUpdatedAt($value)
 * @method static Article published()
 * @property integer $read_count
 * @property integer $user_id
 * @property string $image_path
 * @property string $image_name
 * @property integer $updated_by
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereImagePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereImageName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereReadCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Base\SluggableModel findSimilarSlugs($model, $attribute, $config, $slug)
 */
class Article extends SluggableModel
{
    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'user_id', 'content', 'published_at', 'title', 'image_path', 'image_name', 'update_by'];

    /**
     * Carbon instance fields
     *
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the published_at attribute.
     *
     * @param  $date
     * @return string
     */
    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

    /**
     * Set article publish date
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * Get the content as purified
     *
     * @param $content
     * @return string
     */
    public function getContentAttribute($content)
    {
        return clean($content, 'youtube');
    }

    /**
     * Scope queries to articles that are published
     *
     * @param $query
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }
}