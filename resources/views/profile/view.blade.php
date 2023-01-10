<x-layouts.app title="{{ isset($title) ? 'Profile '.$title : 'Profile Dashboard' }}">
    {{ $slot }}
</x-layouts.app>
