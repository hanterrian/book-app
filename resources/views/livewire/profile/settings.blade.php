<div>
    <x-form.block>
        <x-slot:heading>{{ __('User Settings') }}</x-slot:heading>

        <x-slot:body>
            <x-form.group>
                <x-form.label for="name">Name</x-form.label>
                <x-form.input id="name" wire:model.lazy="name"/>
            </x-form.group>
            <x-form.button wire:click.prevent="changeName">Save</x-form.button>
        </x-slot:body>
    </x-form.block>

    <x-form.block>
        <x-slot:heading>{{ __('Settings') }}</x-slot:heading>

        <x-slot:body>
            <x-form.group>

            </x-form.group>
        </x-slot:body>
    </x-form.block>

    <x-form.block>
        <x-slot:heading>{{ __('Change password') }}</x-slot:heading>

        <x-slot:body>
            <x-form.group>

            </x-form.group>
        </x-slot:body>
    </x-form.block>
</div>
