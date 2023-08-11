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
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper d-flex flex-wrap justify-content-sm-between">
                    <div class="header-top-left mt-10">
                        <ul class="header-meta">
                            <li class="center"><h2 class="text-white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ambo "Tierra Bella y Generosa"</h2></li>
                        </ul>
                    </div>
                    <div class="header-top-right mt-1">
                        <div class="header-link">
                            <a class="notice" href="{{route('intranet')}}">Intranet</a>
                            <a data-animation="fadeInUp" data-delay="1s" class="main-btn p-2 bg-white" target="_blank" href="https://www.transparencia.gob.pe/enlaces/pte_transparencia_enlaces.aspx?id_entidad=12005"><img src="{{asset('storage/imagenes/portaltransparencia.png');}}" width="90px" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-navigation :organizacion="$organizacion" :menus="$menus"></x-navigation>

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
    @routes
    {{-- @vite(['resources/js/app.js']) --}}
</body>

</html>



