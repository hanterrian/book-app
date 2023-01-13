<?php

namespace App\Intervention\Image\Templates;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class Tablet implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->resize(1024, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
    }
}
