<?php

namespace App\View\Components\Elements;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    const TYPE_DEFAULT = 0;
    const TYPE_SUCCESS = 1;
    const TYPE_DANGER = 2;
    const TYPE_WARNING = 3;

    const SIZE_DEFAULT = 0;
    const SIZE_SMALL = 1;
    const SIZE_LARGE = 2;

    public int $type = self::TYPE_DEFAULT;
    public int $size = self::SIZE_DEFAULT;
    /**
     * @var array|string[]
     */
    private array $class;

    public function render(): View
    {
        $this->setType();
        $this->setSize();

        return view('components.elements.button', [
            'class' => implode(" ", $this->class),
        ]);
    }

    private function setType(): void
    {
        $this->class = [
            'text-white',
            'rounded-lg',
            'focus:ring-4',
            'focus:outline-none',
        ];

        switch ($this->type) {
            case self::TYPE_DEFAULT:
            default:
                merge($this->class, [
                    'bg-blue-700',
                    'hover:bg-blue-800',
                    'focus:ring-blue-300',
                    'dark:bg-blue-600',
                    'dark:hover:bg-blue-700',
                    'dark:focus:ring-blue-800',
                ]);
                break;
            case self::TYPE_SUCCESS:
                merge($this->class, [
                    'bg-green-700',
                    'hover:bg-green-800',
                    'focus:ring-green-300',
                    'dark:bg-green-600',
                    'dark:hover:bg-green-700',
                    'dark:focus:ring-green-800',
                ]);
                break;
            case self::TYPE_DANGER:
                merge($this->class, [
                    'bg-red-700',
                    'hover:bg-red-800',
                    'focus:ring-red-300',
                    'dark:bg-red-600',
                    'dark:hover:bg-red-700',
                    'dark:focus:ring-red-800',
                ]);
                break;
            case self::TYPE_WARNING:
                merge($this->class, [
                    'bg-yellow-700',
                    'hover:bg-yellow-800',
                    'focus:ring-yellow-300',
                    'dark:bg-yellow-600',
                    'dark:hover:bg-yellow-700',
                    'dark:focus:ring-yellow-800',
                ]);
                break;
        }
    }

    private function setSize(): void
    {
        switch ($this->size) {
            case self::TYPE_DEFAULT:
            default:
                merge($this->class, [
                    'px-4',
                    'py-2',
                ]);
                break;
            case self::SIZE_SMALL:
                merge($this->class, [
                    'px-2',
                    'py-1',
                ]);
                break;
            case self::SIZE_LARGE:
                merge($this->class, [
                    'px-6',
                    'py-4',
                ]);
                break;
        }
    }
}
