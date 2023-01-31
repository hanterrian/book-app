<x-layouts.base title="{{ $page->title }}">
    @section('head.start')
        {{ \Filament\Facades\Filament::renderHook('filament-fabricator.head.start') }}
    @endsection

    @section('head.end')
        @foreach (\Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getStyles() as $name => $path)
            @if (\Illuminate\Support\Str::of($path)->startsWith('<'))
                {!! $path !!}
            @else
                <link rel="stylesheet" href="{{ $path }}"/>
            @endif
        @endforeach

        {{ \Filament\Facades\Filament::renderHook('filament-fabricator.head.end') }}
    @endsection

    @section('body.start')
        {{ \Filament\Facades\Filament::renderHook('filament-fabricator.body.start') }}
    @endsection

    <x-filament-fabricator::page-blocks :blocks="$page->blocks"/>

    @section('scripts.start')
        {{ \Filament\Facades\Filament::renderHook('filament-fabricator.scripts.start') }}
    @endsection

    @section('scripts.end')
        {{ \Filament\Facades\Filament::renderHook('filament-fabricator.scripts.end') }}
    @endsection

    @section('body.end')
        {{ \Filament\Facades\Filament::renderHook('filament-fabricator.body.end') }}
    @endsection
</x-layouts.base>
