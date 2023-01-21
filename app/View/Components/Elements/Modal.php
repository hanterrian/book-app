<?php

namespace App\View\Components\Elements;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public function render(): View
    {
        return view('components.elements.modal');
    }
}
