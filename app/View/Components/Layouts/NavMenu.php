<?php

namespace App\View\Components\Layouts;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavMenu extends Component
{
    public function render(): View
    {
        $items = [
            route('home') => __('Home'),
        ];

        $pages = Page::whereIsActive(true)->get();

        foreach ($pages as $page) {
            $items[route('front.page', $page->slug)] = $page->title;
        }

        return view('components.layouts.nav-menu', [
            'items' => $items,
        ]);
    }
}
