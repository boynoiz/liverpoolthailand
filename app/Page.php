<?php

namespace App;

use Baum\Node;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Base\Traits\SluggableEngine;

/**
 * App\Page
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
 */
class Page extends Node
{
    use Sluggable, SluggableEngine, SluggableScopeHelpers;

    /**
     * @var array
     */
    protected $fillable = ['content', 'user_id', 'description', 'language_id', 'title', 'image_path', 'image_name', 'update_by'];

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
