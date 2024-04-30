    <!--====== Footer Start ======-->

    <section class="footer-area bg_cover" style="background-image: url(edumate/assets/images/muniambo.webp);">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-2">
                            <h4 class="footer-title">Informacion Destacada</h4>
                            <ul class="link-list">
                                <li><a href="quienes-somos">Quienes Somos</a></li>
                                <li><a href="https://facilita.gob.pe/t/1258">Mesa de Partes</a></li>
                                <li><a href="https://www.gob.pe/institucion/muniambo/informes-publicaciones/4306808-convocatoria-cas-transitorion-001-2023-mpa">Convocatorias</a></li>
                                <li><a href="#">Buson de Sugerencias</a></li>
                                <li><a href="contactenos">Contactenos</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-2">
                            <h4 class="footer-title">Redes Sociales</h4>
                            <ul class="link-list">
                                @foreach ($redessociales as $red)
                                    <li><a target="_blank" href="{{$red['url']}}"><i class="{{$red->icono}}"></i> {{$red->titulo}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-2">
                            <h4 class="footer-title">Libro de Reclamaciones</h4>
                            <a href="">
                                <img src="{{asset('storage/imagenes/reclamaciones.jpg');}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-link mt-2">
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
                    <p>&copy; 2024 <span> {{$organizacion->titulo}} </span> <i class="fas fa-thumbs-up"></i></p>
                </div>
            </div>
        </div>
    </section>

    <!--====== Footer Ends ======-->
