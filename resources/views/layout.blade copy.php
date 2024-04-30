<!DOCTYPE html>
<html lang="es">
    <head>
        <!--================= Meta tag =================-->
        <meta charset="utf-8">
        <title>{{$organizacion->titulo}}</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--================= Favicon =================-->
        <meta name="description" content="{{$organizacion->descripcion}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="{{ Storage::url('imagenes/'.$organizacion->icono) }}" type="image/webp"> 
        <!--================= Bootstrap V5 css =================-->
        <link rel="stylesheet" type="text/css" href="maxplanck/assets/css/bootstrap.min.css">
        <!--================= Menus css =================-->
        <link rel="stylesheet" type="text/css" href="maxplanck/assets/css/menus.css">               
        <!--================= Animate css =================-->
        <link rel="stylesheet" type="text/css" href="maxplanck/assets/css/animate.css">
        <!--================= Owl Carousel css =================-->
        <link rel="stylesheet" type="text/css" href="maxplanck/assets/css/owl.carousel.css">
        <!--================= Elegant icon css  =================-->
        <link rel="stylesheet" type="text/css" href="maxplanck/assets/fonts/elegant-icon.css">
        <!--================= Magnific Popup css =================-->
        <link rel="stylesheet" type="text/css" href="maxplanck/assets/css/magnific-popup.css">
        <!--================= Animations css =================-->
        <link rel="stylesheet" type="text/css" href="maxplanck/assets/css/animations.css">  
        <!--================= style css =================-->
        <link type="text/css" rel="stylesheet" href="{{ asset("/fontawesome6/css/all.min.css") }}">
        <link rel="stylesheet" type="text/css" href="maxplanck/style.css">
        <!--================= Custom Spacing css =================-->
        <link rel="stylesheet" type="text/css" href="maxplanck/assets/css/custom-spacing.css">
        <!--================= Responsive css =================-->
        <link rel="stylesheet" type="text/css" href="maxplanck/assets/css/responsive.css">


        <link href="carousel/css/animate.css" rel="stylesheet" type="text/css">
        <link href="carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="carousel/css/styles.css">



    </head>
    <body> 
        <!--================= Preloader Section Start Here =================-->        
        <div id="react__preloader">
            <div id="react__circle_loader"></div>
            <div class="react__loader_logo p-0 m-0"><img src="{{ Storage::url('imagenes/loader.png') }}" alt="Preload"></div>
        </div>        
        <!--================= Preloader Section End Here =================-->
        <!--================= Header Section Start Here =================-->
        <header id="react-header" class="react-header">
            <div class="topbar-area style1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="topbar-contact">
                               <ul>
                                   <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                       stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                       stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                       <a href="tel:(+1)3344999999"> {{ $organizacion->telefono }}</a>
                                   </li>
                                   <li>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                       <a href="mailto:{{$organizacion->email}}">{{$organizacion->email}}</a>
                                   </li>
                                   
                               </ul>
                            </div>
                        </div>
                        <div class="col-lg-5 text-right">
                            <div class="toolbar-sl-share">
                                <ul class="social-links">
                                    <li><a href="#"><span aria-hidden="true" class="social_facebook"></span></a></li>
                                    <li><a href="#"><span aria-hidden="true" class="social_twitter"></span></a></li>
                                    <li><a href="#"><span aria-hidden="true" class="social_linkedin"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-part">
                <div class="container">
                <x-navigation :organizacion="$organizacion" :menus="$menus"></x-navigation>
                </div>
            </div>
        </header>
        <!--================= Header Section End Here =================-->
        @yield('body-content')
        <!--================= Jquery latest version =================-->
        <script src="maxplanck/assets/js/jquery.min.js"></script>
        <!--================= Modernizr js =================-->
        <script src="maxplanck/assets/js/modernizr-2.8.3.min.js"></script>
        <!--================= Bootstrap js =================-->
        <script src="maxplanck/assets/js/bootstrap.min.js"></script>
        <!--================= Owl Carousel js =================-->
        <script src="maxplanck/assets/js/owl.carousel.min.js"></script>
        <!--================= Magnific Popup =================-->
        <script src="maxplanck/assets/js/jquery.magnific-popup.min.js"></script>
        <!--================= Counter up js =================-->
        <script src="maxplanck/assets/js/jquery.counterup.min.js"></script>
        <script src="maxplanck/assets/js/waypoints.min.js"></script>
        <!--================= Wow js =================-->
        <script src="maxplanck/assets/js/wow.min.js"></script>                
        <!--================= menus js =================-->
        <script src="maxplanck/assets/js/menus.js"></script>
        <!--================= Plugins js =================-->
        <script src="maxplanck/assets/js/plugins.js"></script>       
		<!--================= Main js =================-->
        <script src="maxplanck/assets/js/main.js"></script>



        <script src="carousel/js/wow.min.js"></script>
        <script src="carousel/js/owl.carousel.min.js"></script>
        <script src="carousel/js/venobox.min.js"></script>
        <script src="carousel/js/custom-scripts.js"></script>

        {{-- <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v18.0" nonce="MNXupTpv"></script> --}}


        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v19.0" nonce="TQeB057A"></script>



        <script async src="https://www.tiktok.com/embed.js"></script>

    <!-- Script para abrir el modal automáticamente -->
    <script>
        $(document).ready(function(){
          $('#modalpopup').modal('show');
        })
    </script>
    @yield('miscript')

    </body>
</html>