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
        $this->setType();
        $this->setSize();

        return view('components.element.button');
    }

    private function setType(): void
    {
        switch ($this->type) {
            case self::TYPE_DEFAULT:
            default:
                $this->attributes->merge([
                    'class' => [
                        'text-white',
                        'bg-blue-700',
                        'hover:bg-blue-800',
                        'focus:ring-4',
                        'focus:ring-blue-300',
                        'rounded-lg',
                        'dark:bg-blue-600',
                        'dark:hover:bg-blue-700',
                        'focus:outline-none',
                        'dark:focus:ring-blue-800',
                    ],
                ]);
                break;
            case self::TYPE_ALTERNATIVE:
                $this->attributes->merge(['class' => '']);
                break;
            case self::TYPE_DARK:
                $this->attributes->merge(['class' => '']);
                break;
            case self::TYPE_LIGHT:
                $this->attributes->merge(['class' => '']);
                break;
            case self::TYPE_GREEN:
                $this->attributes->merge(['class' => '']);
                break;
            case self::TYPE_RED:
                $this->attributes->merge(['class' => '']);
                break;
            case self::TYPE_YELLOW:
                $this->attributes->merge(['class' => '']);
                break;
            case self::TYPE_PURPLE:
                $this->attributes->merge(['class' => '']);
                break;
        }
    }

    private function setSize(): void
    {
        switch ($this->size) {
            case self::TYPE_DEFAULT:
            default:
                $this->attributes->merge(['class' => '']);
                break;
            case self::SIZE_SMALL:
                $this->attributes->merge(['class' => '']);
                break;
            case self::SIZE_LARGE:
                $this->attributes->merge(['class' => '']);
                break;
        }
    }
}
