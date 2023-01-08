<form wire:submit.prevent="loginForm">
    <div class="form-floating mb-3">
        <input id="loginFormEmail" class="form-control rounded-3 @error('email') is-invalid @enderror" type="email" wire:model.lazy="email"/>
        <label for="loginFormEmail" class="floatingInput">{{ __('Email') }}</label>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input id="loginFormPassword" class="form-control rounded-3 @error('password') is-invalid @enderror" type="password" wire:model.lazy="password"/>
        <label for="loginFormPassword" class="floatingInput">{{ __('Password') }}</label>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-check form-switch mb-3">
        <input id="loginFormRememberMe" class="form-check-input @error('rememberMe') is-invalid @enderror" type="checkbox" role="switch" wire:model.lazy="rememberMe">
        <label for="loginFormRememberMe" class="form-check-label">{{ __('Remember me') }}</label>
        @error('rememberMe')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary">{{ __('Sign up') }}</button>
</form>
