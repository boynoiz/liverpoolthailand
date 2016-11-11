<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * App\Topic
 *
 * @mixin \Eloquent
 * @property integer $tid
 * @property string $title
 * @property string $state
 * @property integer $posts
 * @property integer $starter_id
 * @property integer $start_date
 * @property integer $last_poster_id
 * @property integer $last_post
 * @property boolean $icon_id
 * @property string $starter_name
 * @property string $last_poster_name
 * @property string $poll_state
 * @property integer $last_vote
 * @property integer $views
 * @property integer $forum_id
 * @property boolean $approved
 * @property boolean $author_mode
 * @property boolean $pinned
 * @property string $moved_to
 * @property integer $topic_hasattach
 * @property integer $topic_firstpost
 * @property integer $topic_queuedposts
 * @property integer $topic_open_time
 * @property integer $topic_close_time
 * @property integer $topic_rating_total
 * @property integer $topic_rating_hits
 * @property string $title_seo
 * @property string $seo_last_name
 * @property string $seo_first_name
 * @property integer $topic_deleted_posts
 * @property integer $tdelete_time
 * @property integer $moved_on
 * @property integer $last_real_post
 * @property integer $topic_archive_status
 * @property integer $topic_answered_pid
 * @method static Builder|Topic whereTid($value)
 * @method static Builder|Topic whereTitle($value)
 * @method static Builder|Topic whereState($value)
 * @method static Builder|Topic wherePosts($value)
 * @method static Builder|Topic whereStarterId($value)
 * @method static Builder|Topic whereStartDate($value)
 * @method static Builder|Topic whereLastPosterId($value)
 * @method static Builder|Topic whereLastPost($value)
 * @method static Builder|Topic whereIconId($value)
 * @method static Builder|Topic whereStarterName($value)
 * @method static Builder|Topic whereLastPosterName($value)
 * @method static Builder|Topic wherePollState($value)
 * @method static Builder|Topic whereLastVote($value)
 * @method static Builder|Topic whereViews($value)
 * @method static Builder|Topic whereForumId($value)
 * @method static Builder|Topic whereApproved($value)
 * @method static Builder|Topic whereAuthorMode($value)
 * @method static Builder|Topic wherePinned($value)
 * @method static Builder|Topic whereMovedTo($value)
 * @method static Builder|Topic whereTopicHasattach($value)
 * @method static Builder|Topic whereTopicFirstpost($value)
 * @method static Builder|Topic whereTopicQueuedposts($value)
 * @method static Builder|Topic whereTopicOpenTime($value)
 * @method static Builder|Topic whereTopicCloseTime($value)
 * @method static Builder|Topic whereTopicRatingTotal($value)
 * @method static Builder|Topic whereTopicRatingHits($value)
 * @method static Builder|Topic whereTitleSeo($value)
 * @method static Builder|Topic whereSeoLastName($value)
 * @method static Builder|Topic whereSeoFirstName($value)
 * @method static Builder|Topic whereTopicDeletedPosts($value)
 * @method static Builder|Topic whereTdeleteTime($value)
 * @method static Builder|Topic whereMovedOn($value)
 * @method static Builder|Topic whereLastRealPost($value)
 * @method static Builder|Topic whereTopicArchiveStatus($value)
 * @method static Builder|Topic whereTopicAnsweredPid($value)
 */
class Topic extends Model
{
    /**
     * @var string
     */
    protected $connection = 'board';

    /**
     * @var string
     */
    protected $table = 'topics';

    /**
     * @var array
     */
    protected $fillable = [
        'tid', 'title', 'starter_id', 'last_poster_id', 'forum_id', 'topic_firstpost', 'title_seo'
    ];

}
