<?php

namespace App\View\Components\Element;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    const TYPE_DEFAULT = 0;
    const TYPE_ALTERNATIVE = 1;
    const TYPE_DARK = 2;
    const TYPE_LIGHT = 3;
    const TYPE_GREEN = 4;
    const TYPE_RED = 5;
    const TYPE_YELLOW = 6;
    const TYPE_PURPLE = 7;

    const SIZE_DEFAULT = 0;
    const SIZE_SMALL = 1;
    const SIZE_LARGE = 2;

    public int $type = self::TYPE_DEFAULT;
    public int $size = self::SIZE_DEFAULT;

    public function render(): View
    {
        return view('components.element.button');
    }
}
