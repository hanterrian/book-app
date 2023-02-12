<form wire:submit.prevent="loginForm">
    <x-form.group>
        <x-form.label for="email">{{ __('Email') }}</x-form.label>
        <x-form.input id="email" type="email" wire:model.lazy="email"/>
    </x-form.group>
    <x-form.group>
        <x-form.label for="password">{{ __('Password') }}</x-form.label>
        <x-form.input id="password" type="password" wire:model.lazy="password"/>
    </x-form.group>
    <x-form.group>
        <x-form.checkbox id="rememberMe" type="checkbox" wire:model.lazy="rememberMe" label="{{ __('Remember me') }}"/>
    </x-form.group>
    <x-elements.button>{{ __('Sign up') }}</x-elements.button>
</form>
