@extends('layout')

@section('body-content')
<!--================= Wrapper Start Here =================-->
<div class="react-wrapper">
    <div class="react-wrapper-inner">
        <!--================= Breadcrumbs Section Start Here =================-->
        <div class="react-breadcrumbs">
            <div class="breadcrumbs-wrap">
                <img class="desktop" src="maxplanck/assets/images/breadcrumbs/1.jpg" alt="Breadcrumbs">
                <img class="mobile" src="maxplanck/assets/images/breadcrumbs/1.jpg" alt="Breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="container">
                        <div class="breadcrumbs-text">
                            <h1 class="breadcrumbs-title">{{$titulo}}</h1>
                            <div class="back-nav">
                                <ul>
                                    <li><a href="">Home</a></li>
                                    <li>{{$titulo}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
        <!--================= Breadcrumbs Section End Here =================-->

        <!--=================  About Section Start Here ================= -->
        <div class="about__area about__area_one p-relative pt---100 pb---120">
            <div class="container">                        
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about__image">

                            <img class="react__shape__ab" src="storage/imagenes/loader.png" width="100" alt="Max Planck">
                        </div>
                        <br>
                        <div class="blog-sidebar right-sidebar pt-20">
                            <div class="blog-sidebar-category mt-30">
                                <div class="sidebar-title">
                                    <h4 class="title">Imagenes</h4>
                                </div>
                                <div class="react-clients react-clientso p-0 m-0">
                                    <div class="client-slider owl-carousel p-0">
                                        @foreach($noticia->imagenes as $item)
                                        <div class="single-client p-2">
                                            <div class="container-fluid">
                                                <a href="#">
                                                    <img src="{{ asset('storage/noticias/'.$item->nombreimagen ) }}" class="w-fluid" width="" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content">
                            <h2 class="about__title">{{$noticia->titulo}}</h2>
                            <h4 class="about__sub-title">{{$noticia->subtitulo}}</h4>
                            <p class="about__paragraph">
                                <?= $noticia->contenido ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================= About Section End Here ================= -->

        
    </div>
</div>
<!--================= Wrapper End Here =================-->
@include('componentes.footer')
@endsection