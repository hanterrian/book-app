<?php

namespace App\Http\Livewire\Auth;

use App\Mail\LoginVerificationCodeMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;
    public $rememberMe = false;

    public $validateCode;

    public $step = 1;

    public function loginForm()
    {
        $this->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
            'rememberMe' => ['accepted'],
        ]);

        /** @var User $user */
        $user = User::where([
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ])->first();

        if (!$user) {
            $this->addError('email', __('Invalid credential'));
        } else {
            $validateCode = Str::random(6);

            $user->update(['validate_code' => $validateCode]);

            Mail::to($user->email)->send(new LoginVerificationCodeMail($user));

            $this->step = 2;
        }
    }

    public function checkForm()
    {
        $this->validate([
            'validateCode' => ['required', 'string', 'max:6'],
        ]);
    }

    public function render()
    {
        switch ($this->step) {
            case 1:
            default:
                return view('livewire.auth.login.login-form');
                break;
            case 2:
                return view('livewire.auth.login.verify-form');
                break;
            case 3:
                return view('livewire.auth.login.success');
                break;
        }
    }
}
