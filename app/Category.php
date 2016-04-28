<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Query\Builder;
use Carbon\Carbon;

/**
 * LTF\Category
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $language_id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $color
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Language $language
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereLanguageId($value)
 * @method static Builder|Category whereTitle($value)
 * @method static Builder|Category whereSlug($value)
 * @method static Builder|Category whereDescription($value)
 * @method static Builder|Category whereColor($value)
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\LTF\Article[] $articles
 */
class Category extends Model implements SluggableInterface
{
    use SluggableTrait;

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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['color', 'user_id', 'description','language_id', 'title', 'image_path', 'image_name', 'update_by'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
