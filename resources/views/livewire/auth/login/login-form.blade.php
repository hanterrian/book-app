<form wire:submit.prevent="loginForm">
    <x-form.group>
        <x-form.label for="loginEmail">{{ __('Email') }}</x-form.label>
        <x-form.input id="loginEmail" type="email" wire:model.lazy="email"/>
    </x-form.group>
    <x-form.group>
        <x-form.label for="loginPassword">{{ __('Password') }}</x-form.label>
        <x-form.input id="loginPassword" type="password" wire:model.lazy="password"/>
    </x-form.group>
    <x-form.group>
        <x-form.checkbox id="loginFormRememberMe" type="checkbox" wire:model.lazy="rememberMe" label="{{ __('Remember me') }}"/>
    </x-form.group>
    <x-elements.button>{{ __('Sign up') }}</x-elements.button>
</form>
