<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * LTF\Gallery
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $member_id
 * @property integer $img_album_id
 * @property string $caption
 * @property string $description
 * @property string $directory
 * @property string $masked_file_name
 * @property string $medium_file_name
 * @property string $original_file_name
 * @property string $file_name
 * @property integer $file_size
 * @property string $file_type
 * @property boolean $approved
 * @property boolean $thumbnail
 * @property integer $views
 * @property integer $comments
 * @property integer $comments_queued
 * @property integer $idate
 * @property integer $ratings_total
 * @property integer $ratings_count
 * @property boolean $rating
 * @property boolean $pinned
 * @property integer $lastcomment
 * @property boolean $media
 * @property string $credit_info
 * @property string $copyright
 * @property string $metadata
 * @property string $media_thumb
 * @property string $caption_seo
 * @property string $image_notes
 * @property integer $image_privacy
 * @property string $image_data
 * @property string $image_parent_permission
 * @property integer $image_feature_flag
 * @property string $image_gps_raw
 * @property string $image_gps_latlon
 * @property integer $image_gps_show
 * @property string $image_gps_lat
 * @property string $image_gps_lon
 * @property string $image_loc_short
 * @property string $image_media_data
 * @method static Builder|Gallery whereId($value)
 * @method static Builder|Gallery whereMemberId($value)
 * @method static Builder|Gallery whereImgAlbumId($value)
 * @method static Builder|Gallery whereCaption($value)
 * @method static Builder|Gallery whereDescription($value)
 * @method static Builder|Gallery whereDirectory($value)
 * @method static Builder|Gallery whereMaskedFileName($value)
 * @method static Builder|Gallery whereMediumFileName($value)
 * @method static Builder|Gallery whereOriginalFileName($value)
 * @method static Builder|Gallery whereFileName($value)
 * @method static Builder|Gallery whereFileSize($value)
 * @method static Builder|Gallery whereFileType($value)
 * @method static Builder|Gallery whereApproved($value)
 * @method static Builder|Gallery whereThumbnail($value)
 * @method static Builder|Gallery whereViews($value)
 * @method static Builder|Gallery whereComments($value)
 * @method static Builder|Gallery whereCommentsQueued($value)
 * @method static Builder|Gallery whereIdate($value)
 * @method static Builder|Gallery whereRatingsTotal($value)
 * @method static Builder|Gallery whereRatingsCount($value)
 * @method static Builder|Gallery whereRating($value)
 * @method static Builder|Gallery wherePinned($value)
 * @method static Builder|Gallery whereLastcomment($value)
 * @method static Builder|Gallery whereMedia($value)
 * @method static Builder|Gallery whereCreditInfo($value)
 * @method static Builder|Gallery whereCopyright($value)
 * @method static Builder|Gallery whereMetadata($value)
 * @method static Builder|Gallery whereMediaThumb($value)
 * @method static Builder|Gallery whereCaptionSeo($value)
 * @method static Builder|Gallery whereImageNotes($value)
 * @method static Builder|Gallery whereImagePrivacy($value)
 * @method static Builder|Gallery whereImageData($value)
 * @method static Builder|Gallery whereImageParentPermission($value)
 * @method static Builder|Gallery whereImageFeatureFlag($value)
 * @method static Builder|Gallery whereImageGpsRaw($value)
 * @method static Builder|Gallery whereImageGpsLatlon($value)
 * @method static Builder|Gallery whereImageGpsShow($value)
 * @method static Builder|Gallery whereImageGpsLat($value)
 * @method static Builder|Gallery whereImageGpsLon($value)
 * @method static Builder|Gallery whereImageLocShort($value)
 * @method static Builder|Gallery whereImageMediaData($value)
 */
class Gallery extends Model
{
    /**
     * @var string
     */
    protected $connection = 'board';

    /**
     * @var string
     */
    protected $table = 'gallery_images';

    /**
     * @var array
     */
    protected $fillable = [
        'member_id',
        'img_album_id',
        'caption',
        'description',
        'directory',
        'masked_file_name',
        'medium_file_name',
        'original_file_name',
        'file_name',
        'approved',
        'views',
        'comments',
        'idate'
    ];
}

