@if($menuItems)
    <ul class="{{ $class }}">
        @foreach($menuItems as $menuItem)
            <li>
                <a href="{{ count($menuItem->children) ? '#' : $menuItem->slug }}" class="@if(str_starts_with(Route::currentRouteName(), $menuItem->ruta)) active @endif">{{ $menuItem->nombre }} </a>
                @if(count($menuItem->children))
                    @include('nav', ['menuItems' => $menuItem->children, 'class' => 'nav-dropdown nav-submenu'])
                @endif
            </li>
        @endforeach
    </ul>
@endif