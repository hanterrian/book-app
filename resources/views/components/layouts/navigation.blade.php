<nav class="">
    <div class="">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <div class="">
            <ul class="">
                @foreach($items as $url=>$label)
                    <li class="">
                        <a class="{{ checkUrl($url) ? '' : '' }}" aria-current="page" href="{{ $url }}">{{ $label }}</a>
                    </li>
                @endforeach
            </ul>

            @livewire('auth.nav-profile-block')
        </div>
    </div>
</nav>
