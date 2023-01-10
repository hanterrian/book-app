<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class ProfileMessage extends Component
{
    public function render()
    {
        return view('livewire.profile.profile-message')
            ->layout('profile.view');
    }
}
