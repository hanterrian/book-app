<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAppContent" aria-controls="navbarAppContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarAppContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach($items as $url=>$label)
                    <li class="nav-item">
                        <a class="{{ checkUrl($url) ? 'nav-link active' : 'nav-link' }}" aria-current="page" href="{{ $url }}">{{ $label }}</a>
                    </li>
                @endforeach
            </ul>

            @livewire('auth.nav-profile-block')
        </div>
    </div>
</nav>
