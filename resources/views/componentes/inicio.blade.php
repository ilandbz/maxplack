<!--================= Wrapper Start Here =================-->
<div class="react-wrapper">
    <div class="react-wrapper-inner">
        <!--================= Slider Section Start Here =================-->
        @include('componentes.slider')
        <!--================= Slider Section End Here =================--> 

        <!--=================  Service Section Start Here ================= -->
        <div class="react_popular_topics pt---100 pb---70">
            <div class="container"> 
            
                <div class="row">
                    <div class="col-md-3">
                        <div class="item__inner">                                    
                            <div class="icon">
                                <img src="maxplanck/assets/images/service/1.png" alt="image">
                            </div>
                            <div class="react-content">
                                <h3 class="react-title"><a href="coureses-grid.html">TITULACION</a></h3>
                                <a href="#" class="r__link">Leer Mas <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                            </div>                                    
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item__inner">                                    
                            <div class="icon">
                                <img src="maxplanck/assets/images/service/2.png" alt="image">
                            </div>
                            <div class="react-content">
                                <h3 class="react-title"><a href="https://elibro.net/es/lc/ietpmaxplanck/inicio/">BIBLIOTECA VIRTUAL</a></h3>
                                <a href="#" class="r__link">Leer Mas <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                            </div>                                    
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item__inner">                                    
                            <div class="icon">
                                <img src="maxplanck/assets/images/service/3.png" alt="image">
                            </div>
                            <div class="react-content">
                                <h3 class="react-title"><a href="coureses-grid.html">ADMISION</a></h3>
                                <a href="#" class="r__link">Leer Mas <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                            </div>                                    
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item__inner">                                    
                            <div class="icon">
                                <img src="maxplanck/assets/images/service/4.png" alt="image">
                            </div>
                            <div class="react-content">
                                <h3 class="react-title"><a href="coureses-grid.html">MESA DE PARTES</a></h3>
                                <a href="#" class="r__link">Leer Mas <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=================  Service Section End Here ================= -->

        <!--=================  About Section Start Here ================= -->

        
        <div class="about__area about__area_one p-relative pt---10 pb---120">
            <div class="container">
                @if (isset($popup))
                    <div class="modal fade" id="modalpopup" tabindex="600" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalpopupLabel">
                                        {{$popup->titulo}}&nbsp;&nbsp;&nbsp;
                                        @if ($popup->link!='#')
                                        <a target="_blank" class="btn btn-primary" href="{{$popup->link}}" role="button">
                                            Ver Más <i class="fas fa-chevron-circle-down"></i>
                                        </a>                                                    
                                        @endif
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="react-clients react-clientso p-0 m-0">
                                        <div class="client-slider owl-carousel p-0">
                                            @foreach($popup->imagenesPopup as $row)
                                            <div class="single-client p-2">
                                                <div class="container-fluid">
                                                    <a href="{{$row->link}}">
                                                        <img src="{{ Storage::url('popup/'.$row->nombreImagen) }}" class="w-fluid" width="" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about__image">
                            <img src="imagenes/princ.jpg" alt="About">
                            <img class="react__shape__ab" src="storage/imagenes/loader.png" width="100" alt="Max Planck">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content">
                            <h2 class="about__title">Sobre Nosotros</h2>
                            <p class="about__paragraph">{{$organizacion->quienes_somos}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================= About Section End Here ================= -->

        <!--================= Popular Course Section Start Here =================-->
        <div class="popular__course__area pt---100 pb---100">
            <div class="container">
                <div class="react__title__section text-center">
                    <h2 class="react__tittle">Programas de Estudio</h2>
                    <img src="maxplanck/assets/images/line.png" alt="image">
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="course__item mb-30">
                            <div class="course__thumb">
                                <a href="enfermeria-tecnica"><img src="maxplanck/assets/images/course/1.png" alt="image"></a>
                            </div>
                            <div class="course__inner">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li class="mr-3"><i class="fas fa-calendar-alt"></i> Semestres : VI</li>
                                    <li><i class="fas fa-clock"></i> Horas : 3240</li>
                                </ul>
                                <h2 class="react-course-title text-center"><a href="enfermeria-tecnica">Enfermeria Tecnica</a></h2>
                                <div class="course__card-icon d-flex align-items-center">
                                    <div class="course__card-icon--1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        <span>77 Estudiantes</span>
                                    </div>                                            
                                    <div class="react__user">
                                        Creditos : 134
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="course__item mb-30">
                            <div class="course__thumb">
                                <a href="produccion-agropecuaria"><img src="maxplanck/assets/images/course/2.png" alt="image"></a>
                            </div>
                            <div class="course__inner">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li class="mr-3"><i class="fas fa-calendar-alt"></i> Semestres : VI</li>
                                    <li><i class="fas fa-clock"></i> Horas : 3240</li>
                                </ul>
                                <h2 class="react-course-title text-center"><a href="produccion-agropecuaria">Produccion Agropecuaria</a></h2>
                                <div class="course__card-icon d-flex align-items-center">
                                    <div class="course__card-icon--1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        <span>99 Estudiantes</span>
                                    </div>                                            
                                    <div class="react__user">
                                        Creditos : 134
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="course__item mb-30">
                            <div class="course__thumb">
                                <a href="mecanica-automotriz"><img src="maxplanck/assets/images/course/3.png" alt="image"></a>
                            </div>
                            <div class="course__inner">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li class="mr-3"><i class="fas fa-calendar-alt"></i> Semestres : VI</li>
                                    <li><i class="fas fa-clock"></i> Horas : 3240</li>
                                </ul>
                                <h2 class="react-course-title text-center"><a href="mecanica-automotriz">Mecanica Automotriz</a></h2>
                                <div class="course__card-icon d-flex align-items-center">
                                    <div class="course__card-icon--1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        <span>68 Estudiantes</span>
                                    </div>                                            
                                    <div class="react__user">
                                        Creditos : 134
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================= Popular Course Section End Here =================-->

        <!--================= Counter Section Start Here =================-->
        <div class="count__area pb---110">
            <div class="container count__width">
                <div class="row">
                    <div class="col-xxl-11 col-xl-11 col-lg-11 offset-lg-1">
                        <div class="row">
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6">
                                <div class="count__content">
                                    <p class="count__content--paragraph">Estudiantes</p>
                                    <h3 class="count__content--title-1 counter">1478</h3>                                       
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6">
                                <div class="count__content">
                                    <p class="count__content--paragraph">Graduados</p>
                                    <h3 class="count__content--title-1 counter">1731</h3>
                                
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6">
                                <div class="count__content">
                                    <p class="count__content--paragraph">Años de Creacion Institucional</p>
                                    <h3 class="count__content--title-1 counter">280</h3>                                      
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6">
                                <div class="count__content">
                                    <p class="count__content--paragraph">Programas de Estudio</p>
                                    <h3 class="count__content--title-1 counter">3</h3>                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================= Counter Section End Here =================-->


        <!--================= Blog Section Start Here =================-->
        <div class="react-blog__area blog__area pt---120 pb---120 graybg-home">
            <div class="container blog__width">
                <div class="react__title__section text-center">                           
                    <h2 class="react__tittle"> Comunicados </h2>
                    <img src="maxplanck/assets/images/line.png" alt="image">
                </div>
                <div class="row">
                    @foreach ($comunicados as $item)
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="blog__card mb-50">
                            <div class="blog__thumb w-fluid p-relative">
                                <a class="blog__thumb--image" href="#">
                                    <img src="/storage/comunicados/{{ $item->nombreImagen }}" style="height: 400px" alt="{{ $item->titulo }}">
                                </a>
                                <em class="b_date">{{ $item->titulo }}</em>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__card--content-area mb-25">
                                    <span class="blog__card--date">{{ $item->titulo }}</span>
                                    <h3 class="blog__card--title"><a href="#">{{ $item->titulo }}</a></h3>
                                </div>
                                <div class="blog__card--icon ">
                                    <div class="blog__card--icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span>{{ $item->titulo }}</span>
                                    </div>                                            
                                </div>
                            </div>
                        </div>        
                    </div>
                    @endforeach
                </div>                        
            </div>
        </div>





        <!--================= Blog Section Start Here =================-->
        <div class="react-blog__area blog__area pt---120 pb---120 graybg-home">
            <div class="container blog__width">
                <div class="react__title__section text-center">                           
                    <h2 class="react__tittle"> GALERIA </h2>
                    <img src="maxplanck/assets/images/line.png" alt="image">
                </div>
                <div class="row">
                    <div class="col">
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
        </div>





        <div class="react-blog__area blog__area pt---120 pb---120 graybg-home">
            <div class="container blog__width">
               <div class="react__title__section text-center">
                  <h2 class="react__tittle">Noticias</h2>
                  <img src="maxplanck/assets/images/line.png" alt="image">
               </div>
               <div class="row">

                @foreach ($noticias as $registro)
                  <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 wow animate__fadeInUp" data-wow-duration="0.3s">
                     <div class="blog__card mb-50">
                        <div class="blog__thumb w-img p-relative"><a class="blog__thumb--image"
                            href="noticia?s={{$registro->slug}}"><img src="{{'storage/noticias/'.$registro->imagen->nombreimagen}}"
                            alt="{{ strlen($registro->subtitulo) > 50 ? substr($registro->subtitulo, 0,50).'...' : $registro->subtitulo }}"></a><em class="b_date" class="bg-primary">{{ $registro->fecha_publicacion }}</em></div>
                        <div class="blog__card--content">
                           <div class="blog__card--content-area mb-25">
                              <span class="blog__card--date">{{$registro->titulo}}</span>
                              <h3 class="blog__card--title"><a href="noticia?s={{$registro->slug}}"> {{ strlen($registro->subtitulo) > 35 ? substr($registro->subtitulo, 0,35).'...' : $registro->subtitulo }}</a></h3>
                           </div>
                           <div class="blog__card--icon d-flex align-items-center">
                              <div class="blog__card--icon-1">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                 </svg>
                                 <span>{{ $registro->fecha_publicacion }}</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                @endforeach


               </div>
            </div>
         </div>


        <div class="react-upcoming__event blog__area mb-0 pb-4">
            <div class="container mb-0 pb-0">
                <div class="react__title__section text-center mb-0 pb-0">
                    <h2 class="react__tittle mb-0">Ubicacion</h2>
                    <img src="maxplanck/assets/images/line.png" alt="image">
                </div>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3927.6552473326938!2d-76.20448182496715!3d-10.127279589984663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTDCsDA3JzM4LjIiUyA3NsKwMTInMDYuOSJX!5e0!3m2!1ses!2spe!4v1712433889027!5m2!1ses!2spe" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<!--================= Wrapper End Here =================-->

@include('componentes.footer')

<!--================= Scroll to Top Start =================-->
<div id="backscrollUp" class="home">
    <span aria-hidden="true" class="arrow_carrot-up"></span>
</div> 
<!--================= Scroll to Top End =================-->
