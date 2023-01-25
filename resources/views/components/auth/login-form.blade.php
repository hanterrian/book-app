<x-elements.modal id="loginFormModal">
    <x-slot:heading>
        {{ __('Login form') }}
    </x-slot:heading>

    <x-slot:body>
        @livewire('auth.login-form')
    </x-slot:body>
</x-elements.modal>
