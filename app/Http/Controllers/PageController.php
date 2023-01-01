<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Inertia\Inertia;

class PageController extends Controller
{
    public function view(string $slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();

        return Inertia::render('Page/View', [
            'page' => $page,
        ]);
    }
}
