<div>
    <div class="card mb-3">
        <div class="card-header">{{ __('User Settings') }}</div>

        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model.lazy="name">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button wire:click.prevent="changeName" class="btn btn-primary">Save</button>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">{{ __('Settings') }}</div>

        <div class="card-body">
            <div class="mb-3">
                <img src="{{ $user->avatar }}" width="32" height="32">
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" wire:model.lazy="avatar">
                @error('avatar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button wire:click.prevent="uploadAvatar" class="btn btn-primary">Save</button>
        </div>
    </div>

    <div class="card">
        <div class="card-header">{{ __('Change password') }}</div>

        <div class="card-body">
            <div class="mb-3">
                <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" wire:model.lazy="new_password">
                <label for="new_password">New Password</label>
                @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" wire:model.lazy="new_password_confirmation">
                <label for="new_password_confirmation">New Password Confirmation</label>
                @error('new_password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button wire:click.prevent="changePassword" class="btn btn-primary">Change</button>
        </div>
    </div>
</div>
