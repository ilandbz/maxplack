<!--====== Page Banner Start ======-->

<section class="page-banner">
    <div class="page-banner-bg bg_cover" style="background-image: url(edumate/assets/images/pagebanner.jpeg);">
        <div class="container">
            <div class="banner-content text-center">
                <h2 class="title">PRUEBA DE PAGINA</h2>
            </div>
        </div>
    </div>
</section>

<!--====== Page Banner Ends ======-->



<!--====== About Start ======-->
<section class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="about-content mt-40">
                    <h2 class="about-title">Quienes <span>Somos</span> </h2>
                    <span class="line"></span>
                    <p>Even slightly believable. If you are going use passage of Lorem Ipsum need desire to obtain pain of itself, because it is pain de sires many pain of itself occur for your study <br> <br> Even slightly believable. If you are going use passage of Lorem Ipsum need desir</p>
                    <a href="#" class="main-btn">Explore</a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="about-image mt-50">
                    <div class="single-image image-1">
                        <img src="edumate/assets/images/about/about-1.webp" width="290" height="290" alt="about">
                    </div>
                    <div class="single-image image-2">
                        <img src="edumate/assets/images/about/about-2.webp" width="225" height="225" alt="about">
                    </div>
                    <div class="single-image image-3">
                        <img src="edumate/assets/images/about/about-3.webp" width="190" height="190" alt="about">
                    </div>
                    <div class="single-image image-4">
                        <img src="edumate/assets/images/about/about-4.webp" width="140" height="140" alt="about">
                    </div>

                    <div class="about-icon icon-1">
                        <img src="edumate/assets/images/about/icon/icon-1.webp" width="46" height="46" alt="icon">
                    </div>
                    <div class="about-icon icon-2">
                        <img src="edumate/assets/images/about/icon/icon-2.webp" width="46" height="46" alt="icon">
                    </div>
                    <div class="about-icon icon-3">
                        <img src="edumate/assets/images/about/icon/icon-3.webp" width="46" height="46" alt="icon">
                    </div>
                    <div class="about-icon icon-4">
                        <img src="edumate/assets/images/about/icon/icon-4.webp" width="46" height="46" alt="icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== About Ends ======-->


    <!--====== Footer Start ======-->

    <section class="footer-area bg_cover" style="background-image: url(edumate/assets/images/counter-bg.webp);">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-45">
                            <h4 class="footer-title">Informacion Destacada</h4>
                            <ul class="link-list">
                                <li><a href="about-us.html">Nosotros</a></li>
                                <li><a href="#">Mesa de Partes</a></li>
                                <li><a href="#">Convocatorias</a></li>
                                <li><a href="#">Buson de Sugerencias</a></li>
                                <li><a href="contact.html">Contactenos</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-45">
                            <h4 class="footer-title">Redes Sociales</h4>
                            <ul class="link-list">
                                @foreach ($redessociales as $red)
                                    <li><a target="_blank" href="{{$red['url']}}"><i class="{{$red->icono}}"></i> {{$red->titulo}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-45">
                            <h4 class="footer-title">Libro de Reclamaciones</h4>
                            <a href="">
                                <img src="{{asset('storage/imagenes/reclamaciones.jpg');}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-45">
                            <h4 class="footer-title">Contactenos</h4>
                            <ul class="link-list">
                                <li>
                                    <p>{{$organizacion->direccion}}</p>
                                </li>
                                <li>
                                    <p><a href="tel:+01254659874">+51 {{$organizacion->telefono}} </a></p>
                                    <p><a href="tel:+32145857458">+51 {{$organizacion->telefono2}}</a></p>
                                </li>
                                <li>
                                    <p><a href="mailto://{{$organizacion->email}}">{{$organizacion->email}}</a></p>
                                    <p><a href="{{$organizacion->url_web}}">{{$organizacion->url_web}}</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="copyright text-center">
                    <p>&copy; 2023 <span> Cristian Wilmer </span> Made with <i class="fa fa-heart"></i> by <a href="#">ilantec</a></p>
                </div>
            </div>
        </div>
    </section>

    <!--====== Footer Ends ======-->
