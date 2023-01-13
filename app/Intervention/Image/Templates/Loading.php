<?php

namespace App\Intervention\Image\Templates;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class Loading implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image
            ->resize(128, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->blur(50);
    }
}
