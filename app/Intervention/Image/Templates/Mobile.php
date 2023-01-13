<?php

namespace App\Intervention\Image\Templates;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class Mobile implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(512, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
    }
}
