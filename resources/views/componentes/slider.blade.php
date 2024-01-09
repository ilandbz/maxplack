<div class="react-slider-part">
    <div class="home-sliders home2 owl-carousel">
        @foreach ($sliders as $slider)
        <div class="single-slide">
            <div class="slider-img">
                <img class="desktop" src="{{ Storage::url('slider/'.$slider->nombreImagen) }}" alt="{{$slider->titulo}}" style="height: 500px">
                <img class="mobile" src="{{ Storage::url('slider/'.$slider->nombreImagen) }}" alt="{{$slider->titulo}}" style="height: 500px">
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
            </div>                        
        </div>  
        @endforeach
    </div>
</div>