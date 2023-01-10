<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function view()
    {
        $user = Auth::user();

        return view('profile.view', [
            'user' => $user,
        ]);
    }
}
