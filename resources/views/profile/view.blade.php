<x-layouts.app title="{{ isset($title) ? 'Profile '.$title : 'Profile Dashboard' }}">
    <main class="row">
        <div class="col-3">
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="{{ route('profile.view') }}" class="nav-link {{ checkUrl(route('profile.view'))?'active':' link-dark' }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.settings') }}" class="nav-link {{ checkUrl(route('profile.settings'))?'active':' link-dark' }}">
                        Settings
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.message') }}" class="nav-link {{ checkUrl(route('profile.message'))?'active':' link-dark' }}">
                        Messages
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-9">
            {{ $slot }}
        </div>
    </main>
</x-layouts.app>
