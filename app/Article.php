<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Query\Builder;

/**
 * LTF\Article
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
 * @property-read \LTF\Category $category
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
 */
class Article extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'content', 'description', 'published_at', 'title', 'image'];

    /**
     * Carbon instance fields
     *
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * Create slug from title using 3rd party trait
     *
     * @var array
     */
    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
        'on_update'  => true
    );

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('LTF\Category');
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
     * Set the slug according to Turkish language (Ö => o and Ü => u) instead of German (Ö => oe and Ü => ue)
     *
     * @param $slug
     */
    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = str_replace(["oe", "ue"], ["o", "u"], $slug);
    }

    /**
     * Scope queries to articles that are published
     *
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }
}