<?php

namespace App\View\Components\Layouts;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Navigation extends Component
{
    private array $items;

    public function __construct()
    {
        $this->items = [
            route('home') => __('Home'),
            route('front.page', ['slug' => 'test']) => __('Test'),
        ];
    }

    public function render(): View
    {
        return view('components.layouts.navigation', [
            'items' => $this->items,
        ]);
    }
}
