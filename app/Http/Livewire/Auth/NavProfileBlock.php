<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

class NavProfileBlock extends Component
{
    protected $listeners = [
        'loginUser' => 'loginUser',
    ];

    public function loginUser()
    {
    }

    /**
     * @return RedirectResponse|Redirector
     */
    public function logoutUser()
    {
        auth()->logout();

        return redirect()->route('home');
    }

    public function render()
    {
        if (auth()->guest()) {
            return view('livewire.auth.nav-profile-block.guest');
        } else {
            $user = auth()->user();

            return view('livewire.auth.nav-profile-block.profile', [
                'user' => $user,
            ]);
        }
    }
}
