<form wire:submit.prevent="checkForm">
    <x-form.group>
        <x-form.label for="validateCode">{{ __('Validate code') }}</x-form.label>
        <x-form.input id="validateCode" wire:model.lazy="validateCode"/>
    </x-form.group>
    <x-elements.button>{{ __('Validate') }}</x-elements.button>
</form>
