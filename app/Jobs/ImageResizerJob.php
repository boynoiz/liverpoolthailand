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

    protected $config;

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

    public function fire($job, $data)
    {
        $path = public_path() . $data['path'];
        $fileName = $data['filename'];
        $config = $this->config;
        $resizeRatio = $config['ratio'];
        $fullImagePath = $path . $fileName;
        $image = Image::make($fullImagePath);
        $sizes = $config['sizes'];
        $image->backup();
        foreach ($sizes as $size)
        {
            if ($size['name'] === 'thumb')
            {
                $image->fit($size['width'], $size['height']);
            }
            else
            {
                if(intval($image->width()/$resizeRatio) > $image->height())
                {
                    $image->fit(intval(($image->width() * $resizeRatio)), $image->height(), null, 'top');
                    $image->resize($size['width'], $size['height']);
                }
                else
                {
                    $image->fit($image->width(), intval($image->width()/$resizeRatio), null, 'top');
                    $image->resize($size['width'], $size['height']);
                }
            }
            File::exists($path . strtolower($size['name'])) ? false : File::makeDirectory($path . strtolower($size['name']));
            $image->save($path . strtolower($size['name']) .'/'. strtolower($size['name']) . '-'. $fileName, 70);
            $image->reset();
        }
        $this->attempts() > 3 ? $this->release(60) : $this->delete();
    }
}
