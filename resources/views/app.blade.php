<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <!--====== Title ======-->
    <title>Edumate Education HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{'organizacion/imagenes/'.$organizacion->icono}}" type="image/webp">
    <!-- CSS
    ============================================ -->
    <!--===== Vendor CSS (Bootstrap & Icon Font) =====-->
    <link rel="stylesheet" href="edumate/assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="edumate/assets/css/plugins/fontawesome.min.css">
    <link rel="stylesheet" href="edumate/assets/css/plugins/default.css">
    <!--===== Plugins CSS (All Plugins Files) =====-->
    <link rel="stylesheet" href="edumate/assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="edumate/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="edumate/assets/css/plugins/magnific-popup.css">
    <!--====== Main Style CSS ======-->
    <!-- <link rel="stylesheet" href="edumate/assets/css/style.css"> -->
    <link rel="stylesheet" href="edumate/assets/css/style.min.css">
</head>

<body>
    <!--====== Header Start ======-->
    <header class="header-area">
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper d-flex flex-wrap justify-content-sm-between">
                    <div class="header-top-left mt-10">
                        <ul class="header-meta">
                            <li><a href="mailto://{{$organizacion->email}}">{{$organizacion->email}}</a></li>
                        </ul>
                    </div>
                    <div class="header-top-right mt-1">
                        <div class="header-link">
                            <a class="notice" href="{{route('intranet')}}">Intranet</a>
                            <a data-animation="fadeInUp" data-delay="1s" class="main-btn p-3 mt-0" href="#"><img src="{{asset('storage/imagenes/portaltransparencia.png');}}" width="90px" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="navigation" class="navigation navigation-landscape">
            <div class="container position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="header-logo">
                            <a href="/"><img src="{{asset('storage/imagenes/'.$organizacion->logo);}}" width="135" height="88" alt="Logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-7 position-static">
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
    </header>
    <!--====== Header Ends ======-->

    @if (isset($pagina))
        @include('componentes.banner')
        @php
            echo $pagina->contenido;
        @endphp
        @include('componentes.footer')

    @else
        @include('componentes.inicio')
    @endif
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== Jquery js ======-->
    <script src="edumate/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="edumate/assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== All Plugins js ======-->
    <script src="edumate/assets/js/plugins/popper.min.js"></script>
    <script src="edumate/assets/js/plugins/bootstrap.min.js"></script>
    <script src="edumate/assets/js/plugins/slick.min.js"></script>
    <script src="edumate/assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="edumate/assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="edumate/assets/js/plugins/isotope.pkgd.min.js"></script>
    <script src="edumate/assets/js/plugins/wow.min.js"></script>
    <script src="edumate/assets/js/plugins/ajax-contact.js"></script>


    <!--====== Main Activation  js ======-->
    <script src="edumate/assets/js/main.js"></script>
    @routes
    @vite(['resources/js/app.js'])
</body>

</html>



