@include('componentes.slider')
@foreach ($secciones as $item)
    @php
        echo $item->contenido;
    @endphp
@endforeach
<style>
.single-courses-2 {
    height: 400px; /* Establece la altura deseada */
}
</style>
<section class="top-courses-area">
    <div class="container">
        <h1 class="text-center bg-info text-white font-weight-bold" style="font-weight: 900">SERVICIOS</h1><br>
        <div class="courses-wrapper fadeInUpBig">
            <div class="row">
                <div class="col-lg-3 col-sm-6 courses-col">
                    <div class="single-courses-2 mt-30">
                        <div class="courses-image">
                            <a href="gerencia-municipal"><img src="imagenes/gmunicipal.jpg" width="270" height="170" alt="courses"></a>
                        </div>
                        <div class="courses-content">
                            <h4 class="courses-title"><a href="gerencia-municipal">GERENCIA MUNICIPAL</a></h4>
                            <div class="duration-rating">
                                <div class="duration-fee">
                                    <p class="duration">Gerencia Municipal</p>
                                    <p class="fee">Gerencia Municipal</p>
                                </div>
                            </div>
                            <div class="courses-link">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 courses-col">
                    <div class="single-courses-2 mt-30">
                        <div class="courses-image">
                            <a href="gerencia-atencion-ciudadano"><img src="imagenes/secretaria.jpg" width="270" height="170" alt="courses"></a>
                        </div>
                        <div class="courses-content">
                            <h4 class="courses-title"><a href="gerencia-atencion-ciudadano">GERENCIA DE LA OFICINA DE ATENCIÓN AL CIUDADANO</a></h4>
                            <div class="duration-rating">
                                <div class="duration-fee">
                                    <p class="duration">Gerencia de Oficina</p>
                                    <p class="fee">de Atencion al Ciudadano</p>
                                </div>
                            </div>
                            <div class="courses-link">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 courses-col">
                    <div class="single-courses-2 mt-30">
                        <div class="courses-image">
                            <a href="gerencia-oficina-administracion"><img src="imagenes/administracion.jpg" width="270" height="170" alt="courses"></a>
                        </div>
                        <div class="courses-content">
                            <h4 class="courses-title"><a href="gerencia-oficina-administracion">GERENCIA DE LA OFICINA GENERAL DE ADMINISTRACIÓN</a></h4>
                            <div class="duration-rating">
                                <div class="duration-fee">
                                    <p class="duration">Gerencia de Oficina</p>
                                    <p class="fee">General de Administracion</p>
                                </div>
                            </div>
                            <div class="courses-link">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 courses-col">
                    <div class="single-courses-2 mt-30">
                        <div class="courses-image">
                            <a href="gerencia-oficina-planeamiento"><img src="imagenes/presupuesto.jpg" width="270" height="170" alt="courses"></a>
                        </div>
                        <div class="courses-content">
                            <h4 class="courses-title"><a href="gerencia-oficina-planeamiento">GERENCIA DE LA OFICINA GENERAL DE PLANEAMIENTO Y PRESUPUESTO</a></h4>
                            <div class="duration-rating">
                                <div class="duration-fee">
                                    <p class="duration">GERENCIA DE LA OFICINA GENERAL</p>
                                    <p class="fee">DE PLANEAMIENTO Y PRESUPUESTO</p>
                                </div>
                            </div>
                            <div class="courses-link">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 courses-col">
                    <div class="single-courses-2 mt-30">
                        <div class="courses-image">
                            <a href="gerencia-territorial-infraestructura"><img src="imagenes/territorial.jpg" width="270" height="170" alt="courses"></a>
                        </div>
                        <div class="courses-content">
                            <h4 class="courses-title"><a href="gerencia-territorial-infraestructura">GERENCIA TERRITORIAL E INFRAESTRUCTURA</a></h4>
                            <div class="duration-rating">
                                <div class="duration-fee">
                                    <p class="duration">GERENCIA TERRITORIAL</p>
                                    <p class="fee">INFRAESTRUCTURA</p>
                                </div>
                            </div>
                            <div class="courses-link">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 courses-col">
                    <div class="single-courses-2 mt-30">
                        <div class="courses-image">
                            <a href="gerencia-asesoria-legal"><img src="imagenes/asesorialegal.jpg" width="270" height="170" alt="courses"></a>
                        </div>
                        <div class="courses-content">
                            <h4 class="courses-title"><a href="gerencia-asesoria-legal">GERENCIA DE LA OFICINA GENERAL DE ASESORÍA LEGAL</a></h4>
                            <div class="duration-rating">
                                <div class="duration-fee">
                                    <p class="duration">GERENCIA DE LA OFICINA</p>
                                    <p class="fee">GENERAL DE ASESORÍA LEGAL</p>
                                </div>
                            </div>
                            <div class="courses-link">
                                
                            </div>
                        </div>
                    </div>
                </div>                                                                   
                <div class="col-lg-3 col-sm-6 courses-col">
                    <div class="single-courses-2 mt-30">
                        <div class="courses-image">
                            <a href="gestion-ambiental"><img src="imagenes/rga.jpg" width="270" height="170" alt="courses"></a>
                        </div>
                        <div class="courses-content">
                            <h4 class="courses-title"><a href="gestion-ambiental">GERENCIA DE GESTION AMBIENTAL Y RECURSOS NATURALES</a></h4>
                            <div class="duration-rating">
                                <div class="duration-fee">
                                    <p class="duration">Gestion Ambiental</p>
                                    <p class="fee">Recursos Naturales</p>
                                </div>
                            </div>
                            <div class="courses-link">
                                
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="col-lg-3 col-sm-6 courses-col">
                    <div class="single-courses-2 mt-30">
                        <div class="courses-image">
                            <a href="desarrollo-social"><img src="imagenes/sociales.jpg" width="270" height="170" alt="courses"></a>
                        </div>
                        <div class="courses-content">
                            <h4 class="courses-title"><a href="desarrollo-social">GERENCIA DE DESARROLLO SOCIAL</a></h4>
                            <div class="duration-rating">
                                <div class="duration-fee">
                                    <p class="duration">Gerencia</span></p>
                                    <p class="fee">Desarrollo Social</p>
                                </div>
                            </div>
                            <div class="courses-link">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 courses-col">
                    <div class="single-courses-2 mt-30">
                        <div class="courses-image">
                            <a href="desarrollo-economico"><img src="imagenes/economico.jpg" width="270" height="170" alt="courses"></a>
                        </div>
                        <div class="courses-content">
                            <h4 class="courses-title"><a href="desarrollo-economico">GERENCIA DE DESARROLLO ECONOMICO Y ADMINISTRACION TRIBUTARIO</a></h4>
                            <div class="duration-rating">
                                <div class="duration-fee">
                                    <p class="duration">Desarrollo Economico</p>
                                    <p class="fee">Administracion Tributario</p>
                                </div>
                            </div>
                            <div class="courses-link">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="event-area">
    <div class="container">
        <h1 class="text-center bg-info text-white font-weight-bold" style="font-weight: 900">COMUNICADOS</h1><br>
        <div class="tab-content event-tab-items wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.2s">
            <div class="tab-pane fade show active" id="courses">
                <div class="row mx-auto my-auto justify-content-center">
                    <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @php
                                $active = true;
                            @endphp
                            @foreach ($comunicados as $comunicado)
                            <div class="carousel-item {{$active == true ? 'active' : ''}}">
                                <div class="col-lg-4">
                                    <div class="single-event text-center mt-30">
                                        @if($comunicado->titulo != '')
                                            <h4 class="event-title"><a href="event-details.html">{{ $comunicado->titulo }}</a></h4>
                                        @endif
                                        <img src="{{asset('storage/comunicados/'.$comunicado->nombreImagen)}}" class="img-fluid" style="height: 450px" alt="">
                                        @if ($comunicado->link)
                                            <a href="{{$comunicado->link}}" class="more">Leer Mas <i class="far fa-chevron-right"></i></a>                                  
                                        @endif
                                    </div>
                                </div>    
                            </div>

                            @php
                                $active = false;
                            @endphp   
                            @endforeach
                        </div>
                        <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="view-btn text-center">
                <a href="comunicados" class="view-more">Ver Mas <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</section>
<section class="blog-area">
    <div class="container">
        <h1 class="text-center bg-info text-white font-weight-bold" style="font-weight: 900">NOTICIAS</h1><br>
        <div class="blog-wrapper">
            <div class="row-wrapper blog-active">
                @foreach ($noticias as $registro)
                <div class="custom-col">
                    <div class="single-blog mt-30">
                        <div class="blog-image" style="height: 190px">
                            <a href="noticia?s={{$registro->slug}}">
                                <img src="{{ asset('storage/noticias/'.$registro->id .'/'. $registro->imagen->nombreimagen) }}" width="370" height="250" alt="blog">
                            </a>
                        </div>
                        <div class="blog-content">
                            <?php
                                $fechaPublicacion = Carbon\Carbon::parse($registro->fecha_publicacion);
                                $fechaFormateada = $fechaPublicacion->isoFormat('dddd D [de] MMMM [de] YYYY', 'Do [de] MMMM [de] YYYY');
                            ?>
                            <ul class="meta">
                                <li><a href="#">{{$fechaFormateada}}</a></li>
                            </ul>
                            <h4 class="blog-title"><a href="noticia?s={{$registro->slug}}">{{$registro->titulo}}</a></h4>
                            <a href="noticia?s={{$registro->slug}}" class="more">Leer Mas <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <h1 class="text-center bg-info text-white font-weight-bold" style="font-weight: 900">INFORMACION SOCIAL</h1><br>
        <div class="row">
            <div class="col">
                <style>
                    .playlist-section {
                        max-height: 250px;
                        overflow-y: auto;
                        overflow-x: hidden
                    }
                        .playlist-section::-webkit-scrollbar {
                            width: 0.5em;
                        }

                        .playlist-section::-webkit-scrollbar-thumb {
                            background-color: #555;
                        }
                    .playlist-item {
                        background-color: #333; /* Color de fondo oscuro para cada elemento de la lista */
                        border-color: #555; /* Color del borde */
                        color: white;
                    }
                    .playlist-item img {
                        max-width: 100px; /* Ancho máximo de la imagen previsualizada */
                        margin-right: 10px; /* Espaciado a la derecha de la imagen */
                    }
                </style>

                <iframe id="youtube-player" width="560" height="315" src="https://www.youtube.com/embed/videoseries?si=d4qEeVLCoSdWLmLm&amp;list=UULFVmWraKZdpxlQJ97dSGryyQ" 
                title="YouTube video player" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                <div id="playlist-section" class="list-group p-0 playlist-section">

                </div>
                <script>
                    // Cargar la lista de reproducción utilizando la API de YouTube
                    const playlistSection = document.getElementById('playlist-section');
                    const playlistId = 'UULFVmWraKZdpxlQJ97dSGryyQ'; // ID de la lista de reproducción
                    const apiKey = 'AIzaSyD7zQpnJ6wpgcGMjaQoUXeCxHLZWgvoWrs'; // Reemplazar con tu clave de API
                    const player = document.getElementById('youtube-player');

                    fetch(`https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=${playlistId}&key=${apiKey}`)
                        .then(response => response.json())
                        .then(data => {
                            // Crear la lista de reproducción
                            data.items.forEach(item => {
                                const videoTitle = item.snippet.title;
                                const videoId = item.snippet.resourceId.videoId;
                                const thumbnailUrl = item.snippet.thumbnails.default.url;

                                // Obtener la duración del video
                                fetch(`https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=${videoId}&key=${apiKey}`)
                                    .then(response => response.json())
                                    .then(videoData => {
                                        const videoDuration = parseISO8601Duration(videoData.items[0].contentDetails.duration);
                                        // Crear un enlace para cada video con miniatura, reproducción y duración
                                        const videoLink = document.createElement('a');
                                        videoLink.href = `javascript:changeVideo('${videoId}')`; // Llama a la función para cambiar y reproducir el video
                                        videoLink.classList.add('list-group-item', 'list-group-item-action', 'playlist-item'); // Agregar la clase 'playlist-item'
                                        videoLink.innerHTML = `<div class="row"><div class="col-md-3"><img src="${thumbnailUrl}" alt="${videoTitle}" class="img-fluid"></div><div class="col-md-9">${videoTitle}<br>Duración: ${videoDuration}</div></div>`;
                                        // Agregar el enlace a la lista de reproducción
                                        playlistSection.appendChild(videoLink);
                                    })
                                    .catch(error => console.error('Error al obtener la duración del video:', error));
                            });
                        })
                        .catch(error => console.error('Error al cargar la lista de reproducción:', error));

                    // Función para cambiar y reproducir el video en el reproductor iframe
                    function changeVideo(videoId) {
                        player.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                    }

                    // Función para convertir la duración de ISO 8601 a un formato más legible
                    function parseISO8601Duration(duration) {
                        const match = duration.match(/PT(\d+H)?(\d+M)?(\d+S)?/);

                        const hours = match[1] ? parseInt(match[1], 10) : 0;
                        const minutes = match[2] ? parseInt(match[2], 10) : 0;
                        const seconds = match[3] ? parseInt(match[3], 10) : 0;

                        return `${hours > 0 ? hours + 'h ' : ''}${minutes > 0 ? minutes + 'm ' : ''}${seconds > 0 ? seconds + 's' : ''}`;
                    }
                </script>                           
            </div>
            <div class="col">
            <div class="fb-page" data-href="https://www.facebook.com/muniambo.pe" data-tabs="timeline" data-width="500" data-height="560" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/muniambo.pe" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/muniambo.pe">Municipalidad Provincial de Ambo</a></blockquote></div>
            </div>
            <div class="col">
                <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@municipalidaddeambo" 
                data-unique-id="municipalidaddeambo" 
                data-embed-type="creator" 
                style="max-width: 780px; min-width: 288px;" > <section>
                    <a target="_blank" href="https://www.tiktok.com/@municipalidaddeambo?refer=creator_embed">@municipalidaddeambo</a> </section> </blockquote>
            </div>
        </div>
    </div>
</section>
<section class="section_enlaces_externos">
    <div class="container">
        <h1 class="text-center bg-info text-white font-weight-bold" style="font-weight: 900">ENLACES EXTERNOS</h1><br>
        <div class="row">
            <div class="col-md-12 animation" data-animation="fadeInUp">
                <div class="cl_logo_slider carousel_slider owl-carousel owl-theme" data-margin="15" data-loop="true" data-autoplay="true" data-dots="false"
                data-responsive='{"0":{"items": "2"}, "100":{"items": "3"}, "100":{"items": "4"}, "100":{"items": "5"}, "100": {"items": "6"}}'>
                    @foreach ($enlaces as $item)
                    <div class="item">
                        <a href="{{$item->link}}"><img src="{{asset('storage/enlacesexternos/'.$item->nombreImagen);}}" width="170px" alt="{{$item->title}}"/></a>
                    </div>                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@if ($popup)
    <div class="modal fade" id="modalPopup" tabindex="-1" aria-labelledby="modalPopupLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-info">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalPopupLabel">Emergente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div id="imagenesPopupCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                    <button type="button" data-bs-target="#imagenesPopupCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#imagenesPopupCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#imagenesPopupCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        @php
                            $valor = true;
                        @endphp
                        @foreach ($popup->imagenesPopup as $imagen)
                            <div class="carousel-item {{ $valor == true ? 'active' : '' }}" data-bs-interval="3000">
                                <img src="{{ asset('storage/popup/'.$imagen->nombreImagen) }}" class="d-block w-100" alt="...">
                            </div>
                            @php
                                $valor = false;
                            @endphp
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imagenesPopupCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imagenesPopupCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            </div>
        </div>
    </div>    
@endif



<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3927.629145476826!2d-76.20727122406618!3d-10.129411109172679!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91a7ee3c3391333b%3A0x9999056b8e25c935!2sMunicipalidad%20Provincial%20de%20Ambo!5e0!3m2!1ses-419!2spe!4v1689300311725!5m2!1ses-419!2spe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

@include('componentes.footer')


@section('script')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v18.0" nonce="MNXupTpv"></script>
<script async src="https://www.tiktok.com/embed.js"></script>
@endsection