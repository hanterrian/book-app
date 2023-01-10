<div class="dropdown text-end">
    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ $user->getFilamentAvatarUrl(32) }}" alt="mdo" width="32" height="32" class="rounded-circle">
    </a>
    <ul class="dropdown-menu text-small">
        <li><a class="dropdown-item {{ checkUrl(route('profile.view'))?'active':'' }}" href="{{ route('profile.view') }}">Dashboard</a></li>
        <li><a class="dropdown-item {{ checkUrl(route('profile.settings'))?'active':'' }}" href="{{ route('profile.settings') }}">Settings</a></li>
        <li><a class="dropdown-item {{ checkUrl(route('profile.message'))?'active':'' }}" href="{{ route('profile.message') }}">Messages</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a href="#" wire:click.prevent="logoutUser" class="dropdown-item">Sign out</a>
        </li>
    </ul>
</div>
