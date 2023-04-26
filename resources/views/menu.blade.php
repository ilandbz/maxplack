@if($menuItems)
    <ul class="{{ $class }}">
        @foreach($menuItems as $menuItem)
            <li>
                <a href="{{ $menuItem->slug }}">{{ $menuItem->nombre }} </a>
                @if(count($menuItem->children))
                    @include('menu', ['menuItems' => $menuItem->children, 'class' => 'nav-dropdown nav-submenu'])
                @endif
            </li>
        @endforeach
    </ul>
@endif
