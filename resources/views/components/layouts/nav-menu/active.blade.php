@props([
    'route',
    'title',
])
<a href="{{ $route }}" class="nav-menu-item-active" aria-current="page">
    {{ $title }}
</a>
