<?php

namespace App;

use App\Base\Traits\SluggableEngine;
use Baum\Node;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

/**
 * App\Page
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $language_id
 * @property integer $parent_id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Language $language
 * @property-read Page $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|Page[] $children
 * @method static Builder|Page whereId($value)
 * @method static Builder|Page whereLanguageId($value)
 * @method static Builder|Page whereParentId($value)
 * @method static Builder|Page whereLft($value)
 * @method static Builder|Page whereRgt($value)
 * @method static Builder|Page whereDepth($value)
 * @method static Builder|Page whereTitle($value)
 * @method static Builder|Page whereSlug($value)
 * @method static Builder|Page whereContent($value)
 * @method static Builder|Page whereDescription($value)
 * @method static Builder|Page whereCreatedAt($value)
 * @method static Builder|Page whereUpdatedAt($value)
 * @method static Node withoutNode($node)
 * @method static Node withoutSelf()
 * @method static Node withoutRoot()
 * @method static Node limitDepth($limit)
 * @property integer $user_id
 * @property string $image_path
 * @property string $image_name
 * @property integer $updated_by
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereImagePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereImageName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page findSimilarSlugs($model, $attribute, $config, $slug)
 */
class Page extends Node
{
    use Sluggable, SluggableEngine, SluggableScopeHelpers;

    /**
     * @var array
     */
    protected $fillable = ['content', 'user_id', 'description', 'language_id', 'title', 'image_path', 'image_name', 'update_by'];

    /**
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
}
