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
                                    <li><a href="{{$red['url']}}"><i class="{{$red->icono}}"></i> {{$red->titulo}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-45">
                            <h4 class="footer-title">Libro de Reclamaciones</h4>
                            <a href="">
                                <img src="{{asset('storage/imagenes/libroreclamo.jpg');}}" alt="">
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
