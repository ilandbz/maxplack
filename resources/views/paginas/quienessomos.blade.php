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
                            <li><a href="mailto://{{$organizacion->email}}">{{$organizacion->email}}</a></li>
                        </ul>
                    </div>
                    <div class="header-top-right mt-1">
                        <div class="header-link">
                            <a class="notice" href="{{route('intranet')}}">Intranet</a>
                            <a data-animation="fadeInUp" data-delay="1s" class="main-btn p-2 bg-white" href="#"><img src="{{asset('storage/imagenes/portaltransparencia.png');}}" width="90px" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-navigation :organizacion="$organizacion" :menus="$menus"></x-navigation>
    </header>
    <!--====== Header Ends ======-->
<!--====== Page Banner Start ======-->

<section class="page-banner">
    <div class="page-banner-bg bg_cover" style="background-image: url(edumate/assets/images/pagebanner.jpeg);">
        <div class="container">
            <div class="banner-content text-center">
                <h2 class="title">{{$titulo}}</h2>
            </div>
        </div>
    </div>
</section>

<!--====== Page Banner Ends ======-->



<section class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="about-content mt-40">
                    <h2 class="about-title">Quienes <span>Somos</span> </h2>
                    <span class="line"></span>
                    <p>{{$organizacion->quienes_somos}}</p>
                    <a href="#" class="main-btn">Explore</a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="about-image mt-50">
                    <div class="single-image image-1">
                        <img src="edumate/assets/images/about/about-1.webp" width="290" height="290" alt="about">
                    </div>
                    <div class="single-image image-2">
                        <img src="edumate/assets/images/about/about-2.webp" width="225" height="225" alt="about">
                    </div>
                    <div class="single-image image-3">
                        <img src="edumate/assets/images/about/about-3.webp" width="190" height="190" alt="about">
                    </div>
                    <div class="single-image image-4">
                        <img src="edumate/assets/images/about/about-4.webp" width="140" height="140" alt="about">
                    </div>

                    <div class="about-icon icon-1">
                        <img src="edumate/assets/images/about/icon/icon-1.webp" width="46" height="46" alt="icon">
                    </div>
                    <div class="about-icon icon-2">
                        <img src="edumate/assets/images/about/icon/icon-2.webp" width="46" height="46" alt="icon">
                    </div>
                    <div class="about-icon icon-3">
                        <img src="edumate/assets/images/about/icon/icon-3.webp" width="46" height="46" alt="icon">
                    </div>
                    <div class="about-icon icon-4">
                        <img src="edumate/assets/images/about/icon/icon-4.webp" width="46" height="46" alt="icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== About Ends ======-->






        @include('componentes.footer')




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













