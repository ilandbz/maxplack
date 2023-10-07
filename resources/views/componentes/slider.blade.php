<div class="react-slider-part">
    <div class="home-sliders home2 owl-carousel">
        @foreach ($sliders as $slider)
        <div class="single-slide">
            <div class="slider-img">
                <img class="desktop" src="{{asset('storage/slider/'.$slider->nombreImagen);}}" alt="{{$slider->titulo}}">
                <img class="mobile" src="maxplanck/assets/images/slider/12.jpg" alt="Slider Image 1">
            </div>
            <div class="container">
                <div class="slider-content">
                    <div class="content-part">
                        <span class="slider-pretitle">{{$slider->titulo}}</span>
                        <h2 class="slider-title">
                            {{$slider->subtitulo}}
                        </h2>
                        @if($slider->nombrebutton1)
                        <div class="slider-btn">
                            <a href="{{$slider->link1}}" class="react-btn-border">{{$slider->nombrebutton1}}</a>
                        </div>                        
                        @endif
                    </div>
                </div>
                {{-- <div class="event__video-btn--play">
                <a href="https://www.youtube.com/watch?v=e5Hc2B50Z7c" class="event__video-btn--play-btn custom-popup">
                    <i class="arrow_triangle-right"></i>
                    <em>Watch Video <br>Intro</em>
                </a>
                </div> --}}
            </div>                        
        </div>  
        @endforeach
    </div>
</div>