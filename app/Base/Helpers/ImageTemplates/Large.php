<?php

namespace LTF\Base\Helpers\ImageTemplates;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Large implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(1280, 800);
    }
}