<?php

namespace App;

use App\Base\SluggableModel;
use Illuminate\Database\Query\Builder;
use Carbon\Carbon;

/**
 * App\Category
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article[] $articles
 */
class Category extends SluggableModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'description','language_id', 'title', 'image_path', 'image_name', 'update_by'];

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
}
