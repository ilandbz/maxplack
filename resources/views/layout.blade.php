<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <!--====== Title ======-->
    <title>{{$organizacion->titulo}}</title>
    <meta name="description" content="{{$organizacion->descripcion}}">
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

    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="componentes/owlcarousel/css/owl.carousel.css" />

    <!--====== Main Style CSS ======-->
    <!-- <link rel="stylesheet" href="edumate/assets/css/style.css"> -->
    <link rel="stylesheet" href="edumate/assets/css/style.css">
</head>

<body>
    <!--====== Header Start ======-->
    <header class="header-area">
        <div class="footer-area bg_cover" style="background-image: url(edumate/assets/images/muniambo.webp);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 text-left"><h6 class="text-white mt-4">{{$fechaActual}}</h6></div>
                    <div class="col-md-6 text-center">
                        <h3 class="text-white"><img src="imagenes/logo_header.jpg" class="img-fluid round thumbnail" width="120px" alt="">&nbsp;&nbsp;&nbsp;Ambo "Tierra Bella y Generosa"</h3>
                    </div>
                    <div class="col-md-3 header-top-wrapper justify-content-end">
                        <div class="header-top-right mt-1 header-top-wrapper">
                            <div class="text-white mr-10" style="text-decoration: none; text-align: right;">
                                <h6 class="text-white mt-4 text-right">
                                    <a class="intranet-btn" style="text-decoration: none;" href="{{route('intranet')}}">Intranet</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <x-navigation :organizacion="$organizacion" :menus="$menus"></x-navigation> --}}
        <div>
            <div id="navigation" class="navigation navigation-landscape">
                <div class="container-fluid position-relative">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <div class="header-logo p-2 pl-4">
                                {{-- <a href="/"><img src="{{asset('storage/imagenes/'.$organizacion->logo);}}" width="80" height="" alt="Logo"></a> --}}
                                <a target="_blank" href="https://www.gob.pe/muniambo"><img src="{{asset('storage/imagenes/portalweb.jpeg');}}" class="img-fluid" height="" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col-md-7 position-static">
                            <div class="container">
                                <div class="nav-toggle d-lg-none" data-toggle="collapse" data-target="#navbarSupportedContent"></div>
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
                        </div>
                        {{-- <div class="col-lg-2 position-static">
                            <div class="header-search">
                                <form action="#">
                                    <input type="text" placeholder="Buscar">
                                    <button><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div> --}}
                        <div class="col-md-2">
                            <div style="text-align: right;">
                            <a class="mr-4 p-0 text-right" data-animation="fadeInUp" data-delay="1s" target="_blank" href="https://www.transparencia.gob.pe/enlaces/pte_transparencia_enlaces.aspx?id_entidad=12005">
                                <img class="rounded right" src="{{asset('storage/imagenes/transparencia.png');}}" width="160px" alt="">
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!--====== Header Ends ======-->


    @yield('body-content')

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


    <!-- owl-carousel min js  --> 
    <script src="componentes/owlcarousel/js/owl.carousel.js"></script> 

    <!-- scripts js --> 
    <script src="componentes/owlcarousel/js/scripts.js"></script>


    <!--====== Main Activation  js ======-->
    <script src="edumate/assets/js/main.js"></script>
    @yield('script')
    
    <script>
        $(document).ready(function(){
          $('#modalPopup').modal('show');

        })
    

        let items = document.querySelectorAll('.carousel .carousel-item')

        items.forEach((el) => {
            const minPerSlide = 3
            let next = el.nextElementSibling
            for (var i=1; i<minPerSlide; i++) {
                if (!next) {
            // wrap carousel by using first child
            next = items[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
        }
        })


    </script>
    
    @routes
    {{-- @vite(['resources/js/app.js']) --}}
</body>

</html>



