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
        <style>
            .small-image {
                width: 280px;
                /* height: 280px; */
            }
        </style>
        
        <div class="about__area">
            <div class="container">
                <div class="react_popular_topics">
                    <div class="react__title__section text-left">
                        <h2 class="react__tittle">{{ $galeria->titulo }}</h2>
                        <p>{{ $galeria->descripcion }}</p>
                        <img src="maxplanck/assets/images/line.png" alt="image">
                    </div>                       
                    <div class="row">
                        <div class="col">
                            <div class="react-clients">
                                <div class="client-slider owl-carousel">
                                    @foreach($imagenes as $row)
                                    <div class="single-client">
                                        <a href="{{$row->link}}">
                                            <img src="{{ Storage::url('galeria/'.$row->nombreimagen) }}" class="small-image" alt="">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
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