<?php

namespace App\View\Components\Elements;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    private ?string $id = null;

    public function render(): View
    {
        return view('components.elements.modal', [
            'id' => $this->id,
        ]);
    }
}
