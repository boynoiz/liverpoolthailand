<?php

namespace LTF\Jobs;

use LTF\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Image;
use File;

class ImageResizerJob extends Job implements SelfHandling ,ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * @var array
     */
    protected $config;

    /**
     * ImageResizerJob constructor.
     */
    public function __construct()
    {
        $this->config = [
            'sizes' => [
                'thumb' => [
                    'name' => 'thumb',
                    'width' => '120',
                    'height' => '120'
                ],
                'small' => [
                    'name' => 'small',
                    'width' => '320',
                    'height' => '180'
                ],
                'medium' => [
                    'name' => 'medium',
                    'width' => '640',
                    'height' => '360'
                ],
                'large' => [
                    'name' => 'large',
                    'width' => '1280',
                    'height' => '720'
                ]
            ],
            'ratio' => 16 / 9,
        ];
    }

    /**
     * @param $job
     * @param $data
     */
    public function fire($job, $data)
    {
        $path = $data['path'];
        $fileName = $data['filename'];
        $config = $this->config;
        $resizeRatio = $config['ratio'];
        $fullImagePath = public_path($path . $fileName);
        $image = Image::make($fullImagePath);
        $sizes = $config['sizes'];
        $image->backup();
        foreach ($sizes as $size)
        {
            if ($size['name'] === 'thumb')
            {
                $background = Image::canvas($size['width'], $size['height']);
                $image->resize($size['width'], null, function($constraint)
                {
                    $constraint->aspectRatio();
                });
                $background->insert($image, 'center');
            }
            else
            {
                if(intval($image->width()/$resizeRatio) > $image->height())
                {
                    $image->resize(intval(($image->width() * $resizeRatio)), null, function($constraint)
                    {
                        $constraint->aspectRatio();
                    });
                    $image->fit($size['width'], $size['height'], null, 'top');
                }
                else
                {
                    $image->resize(null, intval($image->width()/$resizeRatio), function($constraint)
                    {
                    $constraint->aspectRatio();
                    });
                    $image->fit($size['width'], $size['height'], null, 'top');
                }
            }
            File::exists(public_path($path) . strtolower($size['name'])) ? false : File::makeDirectory(public_path($path) . strtolower($size['name']));
            $image->save(public_path($path) . strtolower($size['name']) .'/'. $fileName, 70);
            $image->reset();
        }
        $this->attempts() > 3 ? $this->release(60) : $this->delete();
    }
}
