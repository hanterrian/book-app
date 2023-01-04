<x-html
    :title="isset($title) ? $title.' | '.config('app.name'):''"
    class="bg-white h-screen antialiased leading-none"
>
    <x-slot name="head">
        <x-social-meta
            title="{{ $component->title() }}"
            description="Curate your bucket list and keep track of your next trips. Search for the most popular destinations on our planet."
        />

        <meta name="userId" content="{{ auth()->id() }}"/>

        @vite(['resources/js/app.js'])

        @livewireStyles
        @bukStyles
    </x-slot>

    <x-layouts.navigation/>

    {{ $slot }}

    <x-layouts.footer/>

    @livewireScripts
    @bukScripts
</x-html>
