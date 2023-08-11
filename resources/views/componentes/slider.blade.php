<!--====== Slider Start ======-->
<section class="slider-area slider-active">
    @foreach ($sliders as $slider)
        <div class="single-slider d-flex align-items-center bg_cover" style="background-image: url({{asset('storage/slider/'.$slider->nombreImagen);}});">
            <div class="container">
                <div class="slider-content">
                    <h2 class="title text-black" data-animation="fadeInLeft" data-delay="0.2s">{{$slider->titulo}}</h2>
                    <p style="color: white">{{$slider->subtitulo}}</p>
                    <ul class="slider-btn">
                        @if($slider->nombrebutton1)
                        <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2" href="our-courses-left-sidebar.html">{{$slider->nombrebutton1}}</a></li>
                        @endif
                        @if($slider->nombrebutton2)
                        <li><a data-animation="fadeInUp" data-delay="1s" class="main-btn" href="#">{{$slider->nombrebutton2}}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>    
    @endforeach
</section>

<!--====== Slider Ends ======-->