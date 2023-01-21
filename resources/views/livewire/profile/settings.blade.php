<div>
    <x-form.block>
        <x-slot:heading>{{ __('User Settings') }}</x-slot:heading>

        <x-slot:body>
            <x-form.group>
                <x-form.label for="name">Name</x-form.label>
                <x-form.input id="name" wire:model.lazy="name"/>
            </x-form.group>
            <x-element.button wire:click.prevent="changeName">Save</x-element.button>
        </x-slot:body>
    </x-form.block>

    <x-form.block>
        <x-slot:heading>{{ __('Settings') }}</x-slot:heading>

        <x-slot:body>
            <x-form.group>
                <x-form.image-upload src="{{ $user->avatar }}" name="avatar" wire:model.lazy="avatar"/>
            </x-form.group>
            <x-element.button wire:click.prevent="uploadAvatar">Save</x-element.button>
        </x-slot:body>
    </x-form.block>

    <x-form.block>
        <x-slot:heading>{{ __('Change password') }}</x-slot:heading>

        <x-slot:body>
            <x-form.group>
                <x-form.group>
                    <x-form.label for="new_password">New Password</x-form.label>
                    <x-form.input id="new_password" type="password" wire:model.lazy="new_password"/>
                </x-form.group>
                <x-form.group>
                    <x-form.label for="new_password_confirmation">New Password Confirmation</x-form.label>
                    <x-form.input id="new_password_confirmation" type="password" wire:model.lazy="new_password_confirmation"/>
                </x-form.group>
                <x-element.button wire:click.prevent="changePassword">Change</x-element.button>

            </x-form.group>
        </x-slot:body>
    </x-form.block>
</div>
