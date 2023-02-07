<div>
    <div class="nav-menu" id="mobile-menu-2">
        <ul class="nav-menu-items">
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
