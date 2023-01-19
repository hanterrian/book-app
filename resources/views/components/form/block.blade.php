@props([
    'heading',
    'body',
])
<div class="block max-w-sm mb-3 p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <div {{ $heading->attributes->merge(['class'=>'mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white']) }}>
        {{ $heading }}
    </div>

    <div {{ $body->attributes->merge(['class'=>'p-5']) }}>
        {{ $body }}
    </div>
</div>
