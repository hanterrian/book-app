<div>
    <div class="settings-card">
        <div class="settings-header">{{ __('User Settings') }}</div>

        <div class="settings-body">
            <div class="form-floating">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model.lazy="name">
                <label for="name" class="form-label @error('name') is-invalid @enderror">Name</label>
                @error('name')
                <div class="form-invalid">{{ $message }}</div>
                @enderror
            </div>
            <button wire:click.prevent="changeName" class="settings-btn">Save</button>
        </div>
    </div>

    <div class="settings-card">
        <div class="settings-header">{{ __('Settings') }}</div>

        <div class="settings-body">
            <div class="mb-3">
                <img src="{{ $user->avatar }}" width="32" height="32">
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label @error('avatar') is-invalid @enderror">Avatar</label>
                <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" wire:model.lazy="avatar">
                @error('avatar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button wire:click.prevent="uploadAvatar" class="settings-btn">Save</button>
        </div>
    </div>

    <div class="settings-card">
        <div class="settings-header">{{ __('Change password') }}</div>

        <div class="settings-body">
            <div class="mb-3">
                <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" wire:model.lazy="new_password">
                <label for="new_password" class="form-label @error('new_password') is-invalid @enderror">New Password</label>
                @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" wire:model.lazy="new_password_confirmation">
                <label for="new_password_confirmation" class="form-label @error('new_password_confirmation') is-invalid @enderror">New Password Confirmation</label>
                @error('new_password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button wire:click.prevent="changePassword" class="settings-btn">Change</button>
        </div>
    </div>
</div>
