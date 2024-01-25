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
                            <img src="maxplanck/assets/images/about/ab.png" alt="About">
                            <img class="react__shape__ab" src="maxplanck/assets/images/about/badge.png" alt="Shape Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content">
                            <h2 class="about__title">MISION</h2>
                            <p class="about__paragraph">{{$organizacion->mision}}</p>
                        </div>
                        <div class="about__content">
                            <h2 class="about__title">VISION</h2>
                            <p class="about__paragraph">{{$organizacion->vision}}</p>
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