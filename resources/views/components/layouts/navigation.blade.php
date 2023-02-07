<nav class="navbar">
    <div class="navbar-container">
        <a href="https://flowbite.com/" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="App Logo"/>
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">App</span>
        </a>

        @livewire('auth.nav-profile-block')

        <x-layouts.nav-menu/>
    </div>
</nav>
