@php
    $inputName = $attributes->get('name');
@endphp
<div class="avatar-upload">
    <img
        class="{{ $attributes->get('imageClass','w-10 h-10 rounded cursor-pointer') }}"
        src="{{ $attributes->get('src') }}"
        alt="User avatar"
    />

    <input {{ $attributes->except(['imageCLass','src'])->merge(['type'=>'file']) }} style="display: none"/>

    @error($inputName)
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
