<?php

namespace App\Intervention\Image\Templates;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class Desktop implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(2048, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
    }
}
