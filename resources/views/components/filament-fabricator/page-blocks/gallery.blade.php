@props([
    'items',
])
<div {{ $attributes->class("px-4 py-4 md:py-8") }}>
    <div class="max-w-7xl mx-auto">
        @foreach($items as $item)
            <x-filament-curator::curator-image :media="media($item)"/>
        @endforeach
    </div>
</div>
