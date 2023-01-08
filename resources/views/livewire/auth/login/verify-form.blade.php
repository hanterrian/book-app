<form wire:submit.prevent="checkForm">
    <div class="form-floating mb-3">
        <input id="loginFormValidateCode" class="form-control rounded-3 @error('validateCode') is-invalid @enderror" type="text" wire:model.lazy="validateCode"/>
        <label for="loginFormValidateCode" class="floatingInput">{{ __('Validate code') }}</label>
        @error('validateCode')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary">{{ __('Validate') }}</button>
</form>
