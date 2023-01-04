<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function view(string $slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();
    }
}
