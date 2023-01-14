<?php

namespace App\Faker;

use Faker\Provider\Base;

class FakerImageProvider extends Base
{
    public function getImage(int $width = 500, int $height = 500, ?string $keyword = null): bool|string
    {
        $url = "https://loremflickr.com/$width/$height";

        if (!is_null($keyword)) {
            $url .= "/{$keyword}";
        }

        return file_get_contents($url);
    }
}
