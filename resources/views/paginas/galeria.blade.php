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
                <section class="section-content-block no-padding">
                    <div class="container-fluid no-padding-gallery">
                        <div class="row">               
                        <div class="no-padding-gallery gallery-carousel owl-carousel" data-items='5' data-dots="false" data-autoplaytimeout="150000">
                            @foreach ($registrosgaleria as $item)
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 gallery-container">
                            <a class="gallery-light-box" href="galeria-imagenes?id={{$item->id}}">
                                <figure class="gallery-img">
                                <img src="storage/galeria/{{ $item->primeraImagen->nombreimagen }}" alt="{{ $item->titulo }}">
                                </figure>
                            </a>
                            </div>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>
        <!--================= About Section End Here ================= -->

        
    </div>
</div>





<!--================= Wrapper End Here =================-->
@include('componentes.footer')
@endsection
@section('miscript')

@endsection