<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ProfileSettings extends Component
{
    use WithFileUploads;

    public $name;

    /** @var TemporaryUploadedFile */
    public $avatar;

    public $new_password;
    public $new_password_confirmation;

    public User $user;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->user = Auth::user();

        $this->name = $this->user->name;
    }

    public function changeName()
    {
        $this->validate(['name' => ['required', 'string', 'max:255']]);

        $this->user->update(['name' => $this->name]);
    }

    public function uploadAvatar()
    {
        $this->validate(['avatar' => ['required', 'image', 'max:512']]);

        if ($this->user->avatar_src) {
            Storage::disk('avatars')->delete($this->user->avatar_src);
        }

        $subDirectory = subFolder($this->user->id);

        $fileName = $this->avatar->getFilename();

        $this->avatar->storeAs($subDirectory, $fileName, 'avatars');

        $this->user->update(['avatar_src' => "{$subDirectory}/{$fileName}"]);
    }

    public function changePassword()
    {
        $this->validate([
            'new_password' => ['required', 'string', 'max:255', 'confirmed'],
            'new_password_confirmation' => ['required', 'string', 'max:255'],
        ]);

        $this->user->forceFill(['password' => Hash::make($this->new_password)])
            ->setRememberToken(Str::random(60));

        $this->user->save();

        Auth::logout();

        return $this->redirectRoute('home');
    }

    public function render()
    {
        return view('livewire.profile.settings')
            ->layout('profile.view', [
                'title' => 'Settings',
            ]);
    }
}
