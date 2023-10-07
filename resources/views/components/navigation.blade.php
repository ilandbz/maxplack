<!--================= Menu Start Here =================-->
<div class="react-main-menu">
    <nav>
        <!--================= Menu Toggle btn =================-->
        <div class="menu-toggle">
            <div class="logo"><a href="index.html" class="logo-text"> <img src="{{ Storage::url('imagenes/'.$organizacion->logo) }}" alt="logo"> </a></div>
            <button type="button" id="menu-btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!--================= Menu Structure =================--> 
        <div class="react-inner-menus">
            <ul id="backmenu" class="react-menus home react-sub-shadow">
                @foreach($menus as $menuItem)
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
            <div class="searchbar-part"> 
                <div class="react-login">
                <a href="/intranet">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                    class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle></svg>Intranet</a>
                </div>                                                                       
                {{-- <form class="search-form">
                    <input type="text" class="form-input" placeholder="Search Course">
                    <button type="submit" class="form-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
                </form> --}}
            </div>
        </div>
    </nav>
</div>
<!--=================  Menu End Here  =================-->
