<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class ProfileSettings extends Component
{
    public function render()
    {
        return view('livewire.profile.settings')
            ->layout('profile.view', [
                'title' => 'Settings',
            ]);
    }
}
