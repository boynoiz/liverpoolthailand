<?php

namespace LTF\Base\Services;

use Carbon\Carbon;
use Image;
use File;

/**
 * Class ImageService
 * @package LTF\Base\Services
 */
class ImageService
{
    /**
     * @param $request
     * @param $field
     * @param $imageCategory
     * @return mixed
     */
    public static function uploadImage($request, $field, $imageCategory)
    {
        $data = $request->except($field);
        if ($request->file($field)) {
            $file = $request->file($field);
            $request->file($field);
            $fileName = rename_file($imageCategory, $file->getClientOriginalExtension());
            $date = Carbon::create()->now()->format('Y-m');
            $path = '/assets/images/' . $imageCategory . '/' . $date .'/';
            $move_path = public_path() . $path;
            $file->move($move_path, $fileName);
            ImageService::resize($move_path, $fileName, ['thumb', 'small', 'medium', 'large']);
            $data[$field] = $path . $fileName;
        }
        return $data;
    }

    /**
     * @param $imagePath
     * @param $filename
     * @param array $sizes
     * @return bool
     */
    public static function resize($imagePath, $filename, Array $sizes)
    {
        $resizeRatio = config('assets.ratio');
        $fullImagePath = $imagePath . '/' .$filename;
        $image = Image::make($fullImagePath);
        $image->backup();

        foreach ($sizes as $size)
        {
            $configSize = config('assets.size.' . $size);
            if ($size === 'thumb')
            {
                $image->fit($configSize['width'], $configSize['height']);
            }
            else
            {
                if(intval($image->width()/$resizeRatio) > $image->height())
                {
                    $image->fit(intval(($image->width() * $resizeRatio)), $image->height());
                    $image->resize($configSize['width'], $configSize['height']);
                }
                else
                {
                    $image->fit($image->width(), intval($image->width()/$resizeRatio));
                    $image->resize($configSize['width'], $configSize['height']);
                }
            }
            File::exists($imagePath . '/' . strtolower($size)) ? false : File::makeDirectory($imagePath . '/' . strtolower($size));
            $image->save($imagePath .'/'. strtolower($size) .'/'. strtolower($size) . '-'. $filename);
            $image->reset();
        }
        return true;
    }
}
