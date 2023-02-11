<?php

namespace App\View\Components\Elements;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    const TYPE_DEFAULT = 0;
    const TYPE_SUCCESS = 1;
    const TYPE_WARNING = 2;
    const TYPE_DANGER = 3;

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
            'btn',
        ];

        switch ($this->type) {
            case self::TYPE_DEFAULT:
            default:
                merge($this->class, [
                    'btn-primary',
                ]);
                break;
            case self::TYPE_SUCCESS:
                merge($this->class, [
                    'btn-success',
                ]);
                break;
            case self::TYPE_WARNING:
                merge($this->class, [
                    'btn-warning',
                ]);
                break;
            case self::TYPE_DANGER:
                merge($this->class, [
                    'btn-danger',
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
                    'btn-normal',
                ]);
                break;
            case self::SIZE_SMALL:
                merge($this->class, [
                    'btn-small',
                ]);
                break;
            case self::SIZE_LARGE:
                merge($this->class, [
                    'btn-large',
                ]);
                break;
        }
    }
}
