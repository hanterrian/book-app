<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function view(Page $page)
    {
        return view('page.view', [
            'page' => $page,
        ]);
    }
}
