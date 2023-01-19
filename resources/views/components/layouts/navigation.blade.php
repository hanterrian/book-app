<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="https://flowbite.com/" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="App Logo"/>
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">App</span>
        </a>

        @livewire('auth.nav-profile-block')

        <x-layouts.nav-menu/>
    </div>
</nav>
