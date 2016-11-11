<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Forum
 *
 * @property integer $id
 * @property integer $topics
 * @property integer $posts
 * @property integer $last_post
 * @property integer $last_poster_id
 * @property string $last_poster_name
 * @property string $name
 * @property string $description
 * @property integer $position
 * @property boolean $use_ibc
 * @property boolean $use_html
 * @property string $password
 * @property string $password_override
 * @property string $last_title
 * @property integer $last_id
 * @property string $sort_key
 * @property string $sort_order
 * @property boolean $prune
 * @property string $topicfilter
 * @property boolean $show_rules
 * @property boolean $preview_posts
 * @property boolean $allow_poll
 * @property boolean $allow_pollbump
 * @property boolean $inc_postcount
 * @property integer $skin_id
 * @property integer $parent_id
 * @property string $redirect_url
 * @property boolean $redirect_on
 * @property integer $redirect_hits
 * @property string $rules_title
 * @property string $rules_text
 * @property string $notify_modq_emails
 * @property boolean $sub_can_post
 * @property string $permission_custom_error
 * @property boolean $permission_showtopic
 * @property integer $queued_topics
 * @property integer $queued_posts
 * @property boolean $forum_allow_rating
 * @property integer $forum_last_deletion
 * @property string $newest_title
 * @property integer $newest_id
 * @property integer $min_posts_post
 * @property integer $min_posts_view
 * @property boolean $can_view_others
 * @property boolean $hide_last_info
 * @property string $name_seo
 * @property string $seo_last_title
 * @property string $seo_last_name
 * @property string $last_x_topic_ids
 * @property integer $forums_bitoptions
 * @property integer $disable_sharelinks
 * @property integer $deleted_posts
 * @property integer $deleted_topics
 * @property string $tag_predefined
 * @property float $eco_tpc_pts
 * @property float $eco_rply_pts
 * @property float $eco_get_rply_pts
 * @property integer $archived_topics
 * @property integer $archived_posts
 * @property boolean $viglink
 * @property string $ipseo_priority
 */
class Forum extends Model
{

    /**
     * @var string
     */
    protected $connection = 'board';

    /**
     * @var string
     */
    protected $table = 'forums';

    /**
     * @var array
     */
    protected $fillable = [
        'topics',
        'posts',
        'last_post',
        'last_poster_id',
        'last_poster_name',
        'name',
        'last_title',
        'last_id',
        'newest_title',
        'newest_id',
        'name_seo',
        'seo_last_title'
    ];
}
