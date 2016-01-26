<?php

namespace LTF;

use Illuminate\Database\Eloquent\Model;

/**
 * LTF\Attachment
 *
 * @property integer $attach_id
 * @property string $attach_ext
 * @property string $attach_file
 * @property string $attach_location
 * @property string $attach_thumb_location
 * @property integer $attach_thumb_width
 * @property integer $attach_thumb_height
 * @property boolean $attach_is_image
 * @property integer $attach_hits
 * @property integer $attach_date
 * @property string $attach_post_key
 * @property integer $attach_member_id
 * @property integer $attach_filesize
 * @property integer $attach_rel_id
 * @property string $attach_rel_module
 * @property integer $attach_img_width
 * @property integer $attach_img_height
 * @property integer $attach_parent_id
 * @property integer $attach_is_archived
 */
class Attachment extends Model
{
    /**
     * @var string
     */
    protected $connection = 'board';

    /**
     * @var string
     */
    protected $table = 'attachments';

    /**
     * @var array
     */
    protected $fillable = [
        'attach_id',
        'attach_ext',
        'attach_file',
        'attach_location',
        'attach_thumb_location',
        'attach_thumb_width',
        'attach_thumb_height',
        'attach_is_image',
        'attach_hits',
        'attach_date',
        'attach_member_id',
        'attach_rel_id'
    ];
}
