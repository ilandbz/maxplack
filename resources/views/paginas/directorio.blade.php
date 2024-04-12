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
                                    <li><a href="/">Home</a></li>
                                    <li>{{$titulo}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
        <!--================= Breadcrumbs Section End Here =================-->

        <div class="instructors___page pt---120 pb---140">
            <div class="container pb---60">                        
                <div class="row">
                    @foreach ($registros as $item)
                    <div class="col-lg-3">
                        <div class="instructor__content">
                            <div class="instructor__image">
                                <img src="{{asset('storage/fotos/'.$item->foto)}}" alt="course instructor">
                                <div class="content__hover">
                                    <p>{{ $item->funciones }}</p>
                                    <ul>                                            
                                        <li><a href="#"><span aria-hidden="true" class="social_facebook"></span></a></li>
                                        <li><a title="Curriculum" target="_blank" href="{{ $item->link }}"><i class="fas fa-file-alt"></i></a></li>
                                    </ul>
                                </div>
                            </div>                                    
                            <div class="bottom-content"> 
                                <h4><a href="#">{{ $item->titulo }}</a></h4>
                                <p>{{ $item->cargo->nombre }}</p>
                            </div>                                 
                        </div>
                    </div>                        
                    @endforeach



                </div>
            </div>
        </div>      

        
    </div>
</div>
<!--================= Wrapper End Here =================-->
@include('componentes.footer')
@endsection