<div class="">
    <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ $user->avatar }}" alt="mdo" width="32" height="32" class="rounded-circle">
    </a>
    <ul class="">
        <li><a class=" {{ checkUrl(route('profile.view'))?'':'' }}" href="{{ route('profile.view') }}">Dashboard</a></li>
        <li><a class=" {{ checkUrl(route('profile.settings'))?'':'' }}" href="{{ route('profile.settings') }}">Settings</a></li>
        <li><a class=" {{ checkUrl(route('profile.message'))?'':'' }}" href="{{ route('profile.message') }}">Messages</a></li>
        <li>
            <hr class="">
        </li>
        <li>
            <a href="#" wire:click.prevent="logoutUser" class="">Sign out</a>
        </li>
    </ul>
</div>
