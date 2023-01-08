<?php

namespace App\Http\Livewire\Auth;

use App\Mail\LoginVerificationCodeMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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
            'rememberMe' => ['bool'],
        ]);

        /** @var User $user */
        $user = User::where([
            'email' => $this->email,
        ])->first();

        if (!$user) {
            $this->addError('email', __('Invalid credential'));
        } elseif (!Auth::validate(['email' => $this->email, 'password' => $this->password])) {
            $this->addError('password', __('Invalid password'));
        } else {
            $validateCode = Str::random(6);

            $user->update(['validate_code' => $validateCode]);

            Mail::to($user->email)->send(new LoginVerificationCodeMail($user));

            $this->step = 2;
        }
    }

    /**
     * @return RedirectResponse|void
     */
    public function checkForm()
    {
        $this->validate([
            'validateCode' => ['required', 'string', 'max:6'],
        ]);

        $user = User::whereValidateCode($this->validateCode)->first();

        if (!$user) {
            $this->addError('validateCode', __('Invalid validate code'));
        } else {
            Auth::login($user);

            return redirect()->route('home');
        }
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
        }
    }
}
