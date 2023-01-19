<div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
        <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            @foreach($items as $route=>$title)
                <li>
                    @if(checkUrl($route))
                        <x-layouts.nav-menu.active :route="$route" :title="$title"/>
                    @else
                        <x-layouts.nav-menu.item :route="$route" :title="$title"/>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
