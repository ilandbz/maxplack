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
                            <img src="maxplanck/assets/images/about/ab.png" alt="About">
                            <img class="react__shape__ab" src="maxplanck/assets/images/about/badge.png" alt="Shape Image">
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
                                <a href="coureses-single.html"><img src="maxplanck/assets/images/course/1.png" alt="image"></a>
                            </div>
                            <div class="course__inner">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li class="mr-3"><i class="fas fa-calendar-alt"></i> Semestres : VI</li>
                                    <li><i class="fas fa-clock"></i> Horas : 3240</li>
                                </ul>
                                <h2 class="react-course-title text-center"><a href="coureses-single.html">Enfermeria Tecnica</a></h2>
                                <div class="course__card-icon d-flex align-items-center">
                                    <div class="course__card-icon--1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
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
                                <a href="coureses-single.html"><img src="maxplanck/assets/images/course/2.png" alt="image"></a>
                            </div>
                            <div class="course__inner">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li class="mr-3"><i class="fas fa-calendar-alt"></i> Semestres : VI</li>
                                    <li><i class="fas fa-clock"></i> Horas : 3240</li>
                                </ul>
                                <h2 class="react-course-title text-center"><a href="coureses-single.html">Produccion Agropecuaria</a></h2>
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
                                <a href="coureses-single.html"><img src="maxplanck/assets/images/course/3.png" alt="image"></a>
                            </div>
                            <div class="course__inner">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li class="mr-3"><i class="fas fa-calendar-alt"></i> Semestres : VI</li>
                                    <li><i class="fas fa-clock"></i> Horas : 3240</li>
                                </ul>
                                <h2 class="react-course-title text-center"><a href="coureses-single.html">Mecanica Automotriz</a></h2>
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

        <!--================= Upcoming Event Section Start Here =================-->
        <div class="react-upcoming__event blog__area">
            <div class="container">
                <div class="react__title__section text-center">
                    <h2 class="react__tittle">Eventos Academicos</h2>
                    <img src="maxplanck/assets/images/line.png" alt="image">
                </div>
                <div class="event-slider owl-carousel">
                    <div class="event__card">
                        <div class="event__card--content">
                            <div class="event__card--content-area">
                                <div class="event__card--date"><em>10</em> April, 2022</div>
                                <div class="event_time">10:30 AM - 12:30PM</div>
                                <h3 class="event__card--title"><a href="#">A Better Alternative To <br> Grading Student Writing</a></h3>
                                <div class="event_location"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> New York, USA</div>
                                <a class="event__card--link" href="#"> Find Out More <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                            </div>
                        </div>
                    </div>
                    <div class="event__card">
                        <div class="event__card--content">
                            <div class="event__card--content-area">
                                <div class="event__card--date"><em>14</em> February, 2022</div>
                                <div class="event_time">12:00 AM - 01:30PM</div>
                                <h3 class="event__card--title"><a href="#">12 Things Successful <br> Mompreneurs</a></h3>
                                <div class="event_location"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> New York, USA</div>
                                <a class="event__card--link" href="#"> Find Out More <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                            </div>
                        </div>
                    </div>
                    <div class="event__card">
                        <div class="event__card--content">
                            <div class="event__card--content-area">
                                <div class="event__card--date"><em>26</em> March, 2022</div>
                                <div class="event_time">01:30 AM - 02:00PM</div>
                                <h3 class="event__card--title"><a href="#">Ethics in AI Live Event<br> Machines Judging.</a></h3>
                                <div class="event_location"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> New York, USA</div>
                                <a class="event__card--link" href="#"> Find Out More <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                            </div>
                        </div>
                    </div>
                    <div class="event__card">
                        <div class="event__card--content">
                            <div class="event__card--content-area">
                                <div class="event__card--date"><em>19</em> April, 2022</div>
                                <div class="event_time">03:00 AM - 04:30PM</div>
                                <h3 class="event__card--title"><a href="#">The Importance Of <br> Intrinsic Motivation.</a></h3>
                                <div class="event_location"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> New York, USA</div>
                                <a class="event__card--link" href="#"> Find Out More <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                            </div>
                        </div>
                    </div>
                    <div class="event__card">
                        <div class="event__card--content">
                            <div class="event__card--content-area">
                                <div class="event__card--date"><em>10</em> April, 2022</div>
                                <div class="event_time">10:30 AM - 12:30PM</div>
                                <h3 class="event__card--title"><a href="#">A Better Alternative To <br> Grading Student Writing</a></h3>
                                <div class="event_location"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> New York, USA</div>
                                <a class="event__card--link" href="#"> Find Out More <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                            </div>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>
        <!--================= Upcoming Event Section End Here =================-->
        <!--================= Clients Section Start Here =================--> 
        <div class="react-clients react-clientso home-testimonial pt---90 pb---120">
            <div class="container">
                <div class="react__title__section text-center">
                    <h2>Testimonio de Estudiantes</h2>
                    <img src="maxplanck/assets/images/line.png" alt="image">
                </div>
                <div class="container">
                    <div class="client-slider owl-carousel">
                        <div class="single-client">
                            <div class="client-bottom">                                        
                                <span class="client-author"><img src="maxplanck/assets/images/testimonial/testimonial.png" alt="Testimonials"> </span>
                            </div>                                    
                            <div class="client-content">
                                <span class="client-title">Justin Case <em> Student</em></span>
                                <p>Nulla porttitor accumsan tincidunt. vamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Quisque velit nisi, pretium ut lacinia in.</p>
                                <div class="testimonial__ratings">
                                    <em class="icon_star"></em>
                                    <em class="icon_star"></em>
                                    <em class="icon_star"></em>
                                    <em class="icon_star"></em>
                                    <em class="icon_star_alt"></em>
                                    <span><em>4.9</em> (14 Reviews)</span>
                                </div>
                                <img class="comma" src="maxplanck/assets/images/testimonial/coma.png" alt="image">
                            </div>                                
                        </div>
                        <div class="single-client">
                            <div class="client-bottom">                                        
                                <span class="client-author"><img src="maxplanck/assets/images/testimonial/testimonial.png" alt="Testimonials"> </span>
                            </div>                                    
                            <div class="client-content">
                                <span class="client-title">Justin Case <em> Student</em></span>
                                <p>Nulla porttitor accumsan tincidunt. vamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Quisque velit nisi, pretium ut lacinia in.</p>
                                <div class="testimonial__ratings">
                                    <em class="icon_star"></em>
                                    <em class="icon_star"></em>
                                    <em class="icon_star"></em>
                                    <em class="icon_star"></em>
                                    <em class="icon_star_alt"></em>
                                    <span><em>4.9</em> (14 Reviews)</span>
                                </div>
                                <img class="comma" src="maxplanck/assets/images/testimonial/coma.png" alt="image">
                            </div>                                 
                        </div>
                    </div>
                </div>
            </div>
        </div>             
        <!--================= Clients Section End Here =================--> 

        <!--================= Blog Section Start Here =================-->
        <div class="react-blog__area blog__area pt---120 pb---120 graybg-home">
            <div class="container blog__width">
                <div class="react__title__section text-center">                           
                    <h2 class="react__tittle"> Noticias y Comunicados </h2>
                    <img src="maxplanck/assets/images/line.png" alt="image">
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="blog__card mb-50">
                            <div class="blog__thumb w-img p-relative">
                                <a class="blog__thumb--image" href="blog-details.html">
                                    <img src="maxplanck/assets/images/blog/1.jpg" alt="This the first card image">
                                </a>
                                <em class="b_date">April 12</em>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__card--content-area mb-25">
                                    <span class="blog__card--date">Campaigns</span>
                                    <h3 class="blog__card--title"><a href="blog-details.html">Fostering future Schools <br> & social Innovation</a></h3>
                                </div>
                                <div class="blog__card--icon ">
                                    <div class="blog__card--icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span>Nerte Gronw</span>
                                    </div>                                            
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="blog__card mb-50">
                            <div class="blog__thumb w-img p-relative">
                                <a class="blog__thumb--image" href="blog-details.html">
                                    <img src="maxplanck/assets/images/blog/2.jpg" alt="This the first card image">
                                </a>
                                <em class="b_date">April 18</em>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__card--content-area mb-25">
                                    <span class="blog__card--date">Education</span>
                                    <h3 class="blog__card--title"><a href="blog-details.html">The Surprising Reason <br> CollegeTuition</a></h3>
                                </div>
                                <div class="blog__card--icon d-flex align-items-center">
                                    <div class="blog__card--icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span>Charlie Doyle</span>
                                    </div>                                            
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="blog__card mb-50">
                            <div class="blog__thumb w-img p-relative">
                                <a class="blog__thumb--image" href="blog-details.html">
                                    <img src="maxplanck/assets/images/blog/3.jpg" alt="This the first card image">
                                </a>
                                <em class="b_date">June 16</em>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__card--content-area mb-25">
                                    <span class="blog__card--date">Students</span>
                                    <h3 class="blog__card--title"><a href="blog-details.html">Those other <br> College Expenses about</a></h3>
                                </div>
                                <div class="blog__card--icon d-flex align-items-center">
                                    <div class="blog__card--icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span>Owen Christ</span>
                                    </div>                                            
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="blog__card mb-50">
                            <div class="blog__thumb w-img p-relative">
                                <a class="blog__thumb--image" href="blog-details.html">
                                    <img src="maxplanck/assets/images/blog/3.jpg" alt="This the first card image">
                                </a>
                                <em class="b_date">May 22</em>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__card--content-area mb-25">
                                    <span class="blog__card--date">Strategy</span>
                                    <h3 class="blog__card--title"><a href="blog-details.html">Those other <br> College Expenses about</a></h3>
                                </div>
                                <div class="blog__card--icon d-flex align-items-center">
                                    <div class="blog__card--icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span>Owen Christ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>
        <!--================= Blog Section End Here =================-->
    </div>
</div>
<!--================= Wrapper End Here =================-->

@include('componentes.footer')

<!--================= Scroll to Top Start =================-->
<div id="backscrollUp" class="home">
    <span aria-hidden="true" class="arrow_carrot-up"></span>
</div> 
<!--================= Scroll to Top End =================-->
