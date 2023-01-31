<x-html
    :title="isset($title) ? $title.' | '.config('app.name'):''"
    class="container"
>
    <x-slot name="head">
        @yield('head.start')

        <x-social-meta
            title="{{ $component->title() }}"
            description="Curate your bucket list and keep track of your next trips. Search for the most popular destinations on our planet."
        />

        <meta name="userId" content="{{ auth()->id() }}"/>

        @vite(['resources/js/app.js'])

        @livewireStyles
        @bukStyles(true)

        <wireui:scripts/>

        @yield('head.end')
    </x-slot>

    @yield('body.start')

    <x-layouts.navigation/>

    {{ $slot }}

    @if(auth()->guest())
        <x-auth.login-form/>
        <x-auth.register-form/>
    @endif

    <x-layouts.footer/>

    @yield('scripts.start')

    @livewireScripts
    @bukScripts(true)

    @yield('scripts.end')

    @yield('body.end')
</x-html>
