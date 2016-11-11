<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * App\Member
 *
 * @mixin \Eloquent
 * @property integer $member_id
 * @property string $name
 * @property integer $member_group_id
 * @property string $email
 * @property integer $joined
 * @property string $ip_address
 * @property integer $posts
 * @property string $title
 * @property boolean $allow_admin_mails
 * @property string $time_offset
 * @property integer $skin
 * @property integer $warn_level
 * @property integer $warn_lastwarn
 * @property integer $language
 * @property integer $last_post
 * @property string $restrict_post
 * @property boolean $view_sigs
 * @property boolean $view_img
 * @property integer $bday_day
 * @property integer $bday_month
 * @property integer $bday_year
 * @property integer $msg_count_new
 * @property integer $msg_count_total
 * @property integer $msg_count_reset
 * @property integer $msg_show_notification
 * @property string $misc
 * @property integer $last_visit
 * @property integer $last_activity
 * @property boolean $dst_in_use
 * @property boolean $coppa_user
 * @property string $mod_posts
 * @property string $auto_track
 * @property string $temp_ban
 * @property string $login_anonymous
 * @property string $ignored_users
 * @property string $mgroup_others
 * @property string $org_perm_id
 * @property string $member_login_key
 * @property integer $member_login_key_expire
 * @property string $has_blog
 * @property boolean $has_gallery
 * @property boolean $members_auto_dst
 * @property string $members_display_name
 * @property string $members_seo_name
 * @property boolean $members_created_remote
 * @property string $members_cache
 * @property integer $members_disable_pm
 * @property string $members_l_display_name
 * @property string $members_l_username
 * @property string $failed_logins
 * @property integer $failed_login_count
 * @property integer $members_profile_views
 * @property string $members_pass_hash
 * @property string $members_pass_salt
 * @property boolean $member_banned
 * @property string $member_uploader
 * @property integer $members_bitoptions
 * @property integer $fb_uid
 * @property string $fb_emailhash
 * @property integer $fb_lastsync
 * @property string $members_day_posts
 * @property string $live_id
 * @property string $twitter_id
 * @property string $twitter_token
 * @property string $twitter_secret
 * @property integer $notification_cnt
 * @property integer $tc_lastsync
 * @property string $fb_session
 * @property string $fb_token
 * @property string $ips_mobile_token
 * @property string $gallery_perms
 * @property boolean $unacknowledged_warnings
 * @property boolean $blogs_recache
 * @property integer $ipsconnect_id
 * @property string $ipsconnect_revalidate_url
 * @property integer $shoutbox_shouts
 * @method static Builder|Member whereMemberId($value)
 * @method static Builder|Member whereName($value)
 * @method static Builder|Member whereMemberGroupId($value)
 * @method static Builder|Member whereEmail($value)
 * @method static Builder|Member whereJoined($value)
 * @method static Builder|Member whereIpAddress($value)
 * @method static Builder|Member wherePosts($value)
 * @method static Builder|Member whereTitle($value)
 * @method static Builder|Member whereAllowAdminMails($value)
 * @method static Builder|Member whereTimeOffset($value)
 * @method static Builder|Member whereSkin($value)
 * @method static Builder|Member whereWarnLevel($value)
 * @method static Builder|Member whereWarnLastwarn($value)
 * @method static Builder|Member whereLanguage($value)
 * @method static Builder|Member whereLastPost($value)
 * @method static Builder|Member whereRestrictPost($value)
 * @method static Builder|Member whereViewSigs($value)
 * @method static Builder|Member whereViewImg($value)
 * @method static Builder|Member whereBdayDay($value)
 * @method static Builder|Member whereBdayMonth($value)
 * @method static Builder|Member whereBdayYear($value)
 * @method static Builder|Member whereMsgCountNew($value)
 * @method static Builder|Member whereMsgCountTotal($value)
 * @method static Builder|Member whereMsgCountReset($value)
 * @method static Builder|Member whereMsgShowNotification($value)
 * @method static Builder|Member whereMisc($value)
 * @method static Builder|Member whereLastVisit($value)
 * @method static Builder|Member whereLastActivity($value)
 * @method static Builder|Member whereDstInUse($value)
 * @method static Builder|Member whereCoppaUser($value)
 * @method static Builder|Member whereModPosts($value)
 * @method static Builder|Member whereAutoTrack($value)
 * @method static Builder|Member whereTempBan($value)
 * @method static Builder|Member whereLoginAnonymous($value)
 * @method static Builder|Member whereIgnoredUsers($value)
 * @method static Builder|Member whereMgroupOthers($value)
 * @method static Builder|Member whereOrgPermId($value)
 * @method static Builder|Member whereMemberLoginKey($value)
 * @method static Builder|Member whereMemberLoginKeyExpire($value)
 * @method static Builder|Member whereHasBlog($value)
 * @method static Builder|Member whereHasGallery($value)
 * @method static Builder|Member whereMembersAutoDst($value)
 * @method static Builder|Member whereMembersDisplayName($value)
 * @method static Builder|Member whereMembersSeoName($value)
 * @method static Builder|Member whereMembersCreatedRemote($value)
 * @method static Builder|Member whereMembersCache($value)
 * @method static Builder|Member whereMembersDisablePm($value)
 * @method static Builder|Member whereMembersLDisplayName($value)
 * @method static Builder|Member whereMembersLUsername($value)
 * @method static Builder|Member whereFailedLogins($value)
 * @method static Builder|Member whereFailedLoginCount($value)
 * @method static Builder|Member whereMembersProfileViews($value)
 * @method static Builder|Member whereMembersPassHash($value)
 * @method static Builder|Member whereMembersPassSalt($value)
 * @method static Builder|Member whereMemberBanned($value)
 * @method static Builder|Member whereMemberUploader($value)
 * @method static Builder|Member whereMembersBitoptions($value)
 * @method static Builder|Member whereFbUid($value)
 * @method static Builder|Member whereFbEmailhash($value)
 * @method static Builder|Member whereFbLastsync($value)
 * @method static Builder|Member whereMembersDayPosts($value)
 * @method static Builder|Member whereLiveId($value)
 * @method static Builder|Member whereTwitterId($value)
 * @method static Builder|Member whereTwitterToken($value)
 * @method static Builder|Member whereTwitterSecret($value)
 * @method static Builder|Member whereNotificationCnt($value)
 * @method static Builder|Member whereTcLastsync($value)
 * @method static Builder|Member whereFbSession($value)
 * @method static Builder|Member whereFbToken($value)
 * @method static Builder|Member whereIpsMobileToken($value)
 * @method static Builder|Member whereGalleryPerms($value)
 * @method static Builder|Member whereUnacknowledgedWarnings($value)
 * @method static Builder|Member whereBlogsRecache($value)
 * @method static Builder|Member whereIpsconnectId($value)
 * @method static Builder|Member whereIpsconnectRevalidateUrl($value)
 * @method static Builder|Member whereShoutboxShouts($value)
 */
class Member extends Model
{
    /**
     * @var string
     */
    protected $connection = 'board';

    /**
     * @var string
     */
    protected $table = 'members';

    /**
     * @var array
     */
    protected $fillable = ['member_id', 'name', 'member_group_id', 'email', 'members_pass_hash', 'joined', 'members_display_name'];

    /**
     * @var array
     */
    protected $hidden = ['members_pass_hash', 'members_login_key'];
}
