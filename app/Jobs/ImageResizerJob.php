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

    public function fire($job, $data)
    {
        $path = public_path() . $data['path'];
        $fileName = $data['filename'];
        $config = config('assets');
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
