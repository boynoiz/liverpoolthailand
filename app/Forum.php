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
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereTopics($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum wherePosts($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereLastPost($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereLastPosterId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereLastPosterName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum wherePosition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereUseIbc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereUseHtml($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum wherePasswordOverride($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereLastTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereLastId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereSortKey($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereSortOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum wherePrune($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereTopicfilter($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereShowRules($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum wherePreviewPosts($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereAllowPoll($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereAllowPollbump($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereIncPostcount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereSkinId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereRedirectUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereRedirectOn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereRedirectHits($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereRulesTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereRulesText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereNotifyModqEmails($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereSubCanPost($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum wherePermissionCustomError($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum wherePermissionShowtopic($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereQueuedTopics($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereQueuedPosts($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereForumAllowRating($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereForumLastDeletion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereNewestTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereNewestId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereMinPostsPost($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereMinPostsView($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereCanViewOthers($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereHideLastInfo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereNameSeo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereSeoLastTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereSeoLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereLastXTopicIds($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereForumsBitoptions($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereDisableSharelinks($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereDeletedPosts($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereDeletedTopics($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereTagPredefined($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereEcoTpcPts($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereEcoRplyPts($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereEcoGetRplyPts($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereArchivedTopics($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereArchivedPosts($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereViglink($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Forum whereIpseoPriority($value)
 * @mixin \Eloquent
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
