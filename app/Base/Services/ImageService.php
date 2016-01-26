<?php

namespace LTF\Base\Services;

use Carbon\Carbon;

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
            $fileName = rename_file($file->getClientOriginalName(), $file->getClientOriginalExtension());
            $date = Carbon::create()->now()->format('d-m-Y');
            $path = '/assets/images/' . $imageCategory . '/' . $date;
            $move_path = public_path() . $path;
            $file->move($move_path, $fileName);
            $data[$field] = $path . $fileName;
        }
        return $data;
    }
}
