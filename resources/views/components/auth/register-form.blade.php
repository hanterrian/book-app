<x-elements.modal id="registerFormModal">
    <x-slot:heading>
        {{ __('Register form') }}
    </x-slot:heading>

    <x-slot:body>
        @livewire('auth.register-form')
    </x-slot:body>
</x-elements.modal>
