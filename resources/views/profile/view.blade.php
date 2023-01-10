<x-layouts.app title="{{ isset($title) ? 'Profile '.$title : 'Profile Dashboard' }}">
    <main class="d-flex flex-nowrap">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
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
        <div class="d-flex">
            {{ $slot }}
        </div>
    </main>
</x-layouts.app>
