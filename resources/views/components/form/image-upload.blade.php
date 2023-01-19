@php
    $inputName = $attributes->get('name');
@endphp
<div>
    <img
        class="{{ $attributes->only('imageClass')->merge(['imageClass'=>'w-10 h-10 rounded']) }}"
        src="{{ $attributes->get('src') }}"
        alt="User avatar"
    />

    <input {{ $attributes->except(['imageCLass','src'])->merge(['type'=>'file']) }} style="display: none"/>

    @error($inputName)
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
