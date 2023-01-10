<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class ProfileDashboard extends Component
{
    public function render()
    {
        return view('livewire.profile.profile-dashboard')
            ->layout('profile.view');
    }
}
