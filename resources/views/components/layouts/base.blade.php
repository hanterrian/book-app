<x-html
    :title="isset($title) ? $title.' | '.config('app.name'):''"
    class="container"
>
    <x-slot name="head">
        {{ \Filament\Facades\Filament::renderHook('filament-fabricator.head.start') }}
        
        <x-social-meta
            title="{{ $component->title() }}"
            description="Curate your bucket list and keep track of your next trips. Search for the most popular destinations on our planet."
        />

        <meta name="userId" content="{{ auth()->id() }}"/>

        @vite(['resources/js/app.js'])

        @livewireStyles
        @bukStyles(true)

        <wireui:scripts/>

        @foreach (\Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getStyles() as $name => $path)
            @if (\Illuminate\Support\Str::of($path)->startsWith('<'))
                {!! $path !!}
            @else
                <link rel="stylesheet" href="{{ $path }}"/>
            @endif
        @endforeach

        {{ \Filament\Facades\Filament::renderHook('filament-fabricator.head.end') }}
    </x-slot>

    {{ \Filament\Facades\Filament::renderHook('filament-fabricator.body.start') }}

    <x-layouts.navigation/>

    {{ $slot }}

    @if(auth()->guest())
        <x-auth.login-form/>
        <x-auth.register-form/>
    @endif

    <x-layouts.footer/>

    {{ \Filament\Facades\Filament::renderHook('filament-fabricator.scripts.start') }}

    @livewireScripts
    @bukScripts(true)

    {{ \Filament\Facades\Filament::renderHook('filament-fabricator.scripts.end') }}

    {{ \Filament\Facades\Filament::renderHook('filament-fabricator.body.end') }}
</x-html>
