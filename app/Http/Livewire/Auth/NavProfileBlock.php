<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class NavProfileBlock extends Component
{
    protected $listeners = [
        'loginUser' => 'loginUser',
    ];

    public function loginUser()
    {
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
