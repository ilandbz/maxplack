@if($menuItems)
<ul>
    @foreach($menuItems as $menuItem)
    <li>
        <a href="{{ count($menuItem->children) ? '#' : $menuItem->slug }}">
            {{ $menuItem->nombre }}
        </a>
        @if(count($menuItem->children))
            @include('nav', ['menuItems' => $menuItem->children])
        @endif
    </li>
    @endforeach
</ul>
@endif
