<div>
    <div id="navigation" class="navigation navigation-landscape">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="header-logo">
                        <a href="/"><img src="{{asset('storage/imagenes/'.$organizacion->logo);}}" width="120" height="" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-8 position-static">
                    <div class="nav-toggle"></div>
                    <nav class="nav-menus-wrapper">
                        <ul class="nav-menu">
                            @foreach($menus as $menuItem)
                                <li>
                                    <a href="{{ count($menuItem->children) ? '#' : $menuItem->slug }}" class="@if(str_starts_with(Route::currentRouteName(), $menuItem->ruta)) active @endif">{{ $menuItem->nombre }}</a>
                                    @if(count($menuItem->children))
                                        @include('nav', ['menuItems' => $menuItem->children, 'class' => 'nav-dropdown nav-submenu'])
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 position-static">
                    <div class="header-search">
                        <form action="#">
                            <input type="text" placeholder="Search">
                            <button><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>