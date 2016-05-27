<?php

namespace LTF;

use Baum\Node;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Query\Builder;

/**
 * LTF\Page
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
 * @property-read \LTF\Language $language
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
class Page extends Node implements SluggableInterface
{
    use SluggableTrait;

    protected $fillable = ['content', 'user_id', 'description', 'language_id', 'title', 'image_path', 'image_name', 'update_by'];

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

    /**
     * Set the slug according to Turkish language (Ö => o and Ü => u) instead of German (Ö => oe and Ü => ue)
     *
     * @param $slug
     */
    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = str_replace(["oe", "ue"], ["o", "u"], $slug);
    }
}
