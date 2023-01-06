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
        $items = [];

        foreach ($this->items as $route => $label) {
            $active = false;

            if (url()->full() == $route) {
                $active = true;
            }

            $items[$route] = [
                'label' => $label,
                'url' => $route,
                'active' => $active,
            ];
        }

        return view('components.layouts.navigation', [
            'items' => $items,
        ]);
    }
}
