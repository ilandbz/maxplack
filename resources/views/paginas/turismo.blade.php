@extends('layout')
@section('body-content')
    <style>
        /* Agrega un estilo personalizado para el fondo de pantalla */
        .single-slider {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        /* Agrega un estilo personalizado para el fondo con opacidad */
        .single-slider {
            position: relative;
        }

        .single-slider::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Cambia el valor de opacidad (0.5) según lo desees */
        }

        /* Ajusta el color del texto y otros estilos según sea necesario */
        .slider-content {
            position: relative;
            z-index: 1;
            color: white;
        }

       .slider-content h2 {
            text-shadow: 4px 4px 9px rgba(0, 0, 0, 0.9); /* Cambia los valores según lo desees */
        }
    </style>
    <!--====== Page Banner Start ======-->
    <section class="page-banner">
        <div class="page-banner-bg bg_cover" style="background-image: url(edumate/assets/images/pagebanner.jpeg);">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title">{{$titulo}}</h2>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Banner Ends ======-->
    <section class="about-area pt-2">
        <div class="container mb-4 pt-2">
            <div class="courses-details-content mt-0">
                <section class="slider-area_mod slider-active">
                    <div class="single-slider d-flex align-items-center" style="background-image: url(imagenes/pishgacocha.jpg);">
                        <div class="container">
                            <div class="slider-content">
                                <h2 class="title text-white" data-animation="fadeInLeft" data-delay="0.2s">LAS 5 LAGUNAS DE PICHGACOCHA</h2>
                                <p style="color: white">CONCHAMARCA</p>
                                <ul class="slider-btn">
                                    <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2 cargar" data-nombre="pishgacocha">Ver Mas</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-slider d-flex align-items-center" style="background-image: url(imagenes/perricholi.jpg);">
                        <div class="container">
                            <div class="slider-content">
                                <h2 class="title text-white" data-animation="fadeInLeft" data-delay="0.2s">LA CASA DE LA PERRICHOLI – TOMAYQUICHWA</h2>
                                <ul class="slider-btn">
                                    <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2 cargar" data-nombre="perricholi">Ver Mas</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-slider d-flex align-items-center" style="background-image: url(imagenes/hatunuchco.jpg);">
                        <div class="container">
                            <div class="slider-content">
                                <h2 class="title text-white" data-animation="fadeInLeft" data-delay="0.2s">CAVERNA DE JATUN UCHCO – AMBO</h2>
                                <ul class="slider-btn">
                                    <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2 cargar" data-nombre="hatunuchco">Ver Mas</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>    
                    <div class="single-slider d-flex align-items-center" style="background-image: url(imagenes/huancapata.jpg);">
                        <div class="container">
                            <div class="slider-content">
                                <h2 class="title text-white" data-animation="fadeInLeft" data-delay="0.2s">PUENTE HUANCAPATA</h2>
                                <ul class="slider-btn">
                                    <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2 cargar" data-nombre="huancapata">Ver Mas</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>                    
                    <div class="single-slider d-flex align-items-center" style="background-image: url(imagenes/iglesia.jpg);">
                        <div class="container">
                            <div class="slider-content">
                                <h2 class="title text-white" data-animation="fadeInLeft" data-delay="0.2s">IGLESIA VIRGEN DEL CARMEN</h2>
                                <ul class="slider-btn">
                                    <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2 cargar" data-nombre="iglesia">Ver Mas</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-slider d-flex align-items-center" style="background-image: url(imagenes/huampo.jpg);">
                        <div class="container">
                            <div class="slider-content">
                                <h2 class="title text-white" data-animation="fadeInLeft" data-delay="0.2s">LA LAGUNA DE HUAMPO</h2>
                                <ul class="slider-btn">
                                    <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2 cargar" data-nombre="huampo">Ver Mas</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-slider d-flex align-items-center" style="background-image: url(imagenes/rumichaca.jpg);">
                        <div class="container">
                            <div class="slider-content">
                                <h2 class="title text-white" data-animation="fadeInLeft" data-delay="0.2s">LA LAGUNA DE RUMICHACA</h2>
                                <ul class="slider-btn">
                                    <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2 cargar" data-nombre="rumichaca">Ver Mas</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-slider d-flex align-items-center" style="background-image: url(imagenes/arcopunco.jpg);">
                        <div class="container">
                            <div class="slider-content">
                                <h2 class="title text-white" data-animation="fadeInLeft" data-delay="0.2s">OBELISCO DE ARCOPUNCO</h2>
                                <ul class="slider-btn">
                                    <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2 cargar" data-nombre="arcopunco">Ver Mas</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>  
                    <div class="single-slider d-flex align-items-center" style="background-image: url(imagenes/atash.jpg);">
                        <div class="container">
                            <div class="slider-content">
                                <h2 class="title text-white" data-animation="fadeInLeft" data-delay="0.2s">CENTRO ARQUEOLOGICO DE ATASH</h2>
                                <ul class="slider-btn">
                                    <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2 cargar" data-nombre="atash">Ver Mas</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>                                                                              
                </section>
                <!--====== Slider Ends ======-->

<div class="collapse" id="contenido">
Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat quisquam natus qui voluptatibus quo blanditiis accusantium minus! Molestias iste consectetur, quam laboriosam distinctio consequatur praesentium illum nemo quibusdam asperiores laborum.
</div>

                <div class="d-none" id="pishgacocha">
                        <p style="text-align:justify !important;" class="mb-2">El término Pichgacocha deriva de ti en runashimi: "pichga" = cinco y "cocha" = laguna, se necesita esta denominación en este lugar hay 5 lagunas que se conectan entre sí en forma sucesiva por los arroyos que nacen.</p>
                        <p style="text-align:justify !important;" class="mb-2">Pichgacocha, es un conjunto de cinco super-lagunas, que corresponden a la cordillera oriental de los Andes del Norte, cuyo origen proviene de los arroyos glaciares. El caudal de estas lagunas inter-lagunas se ha mantenido debido a las estaciones fluviales y la presencia de manantiales como consecuencia directa del factor anterior; las lagunas están ubicadas a diferentes niveles y unidas irregularmente por cascadas de agua cristalina.</p>
                        <p style="text-align:justify !important;" class="mb-2">Pichgacocha está incrustado en la maciza cordillera de la sierra huanuqueña, distribuida en un desorden artístico en diferentes niveles latitudinales. Permanecen unidos entre sí, por hermosas cascadas de agua formando una alegría singular que adorna con sutil encanto las depresiones naturales de la montaña salvaje donde parece revivir, de vez en cuando, el impulso que crea esos fuertes pleistocenos que moldearon el rostro de este parte de la tierra tiene millones de años. Este prodigio de la naturaleza es único a nivel mundial, en el terreno es un recurso turístico, también una campana hidrológica que da origen a la agricultura en las alturas de Conchamarca. Manteniendo casi virgen este paraje. Haga algunos pozos a las cinco lagunas, debido al terreno accidentado. Estos son motivos para visitas cada vez más frecuentes, ya que las autoridades lograron crear trucos, hasta las oportunidades 1961 - 1962. Su potencial turístico, se conoce desde el primer Seminario de Arqueología y Turismo “Ricardo Flores”; celebrada del 25 al 28 de noviembre de 1984, desde donde se informó a los asistentes, personas interesadas en el turismo, de la existencia de este paradisíaco lugar que también se pudo ver desde la primera cascada, desde la camioneta a Huánuco, como invitación y Desafío a los amantes del senderismo y el turismo de aventura.</p>
                        <h4>UBICACIÓN</h4>
                        <p style="text-align:justify !important;" class="mb-2">
                            Ubicado en este distrito de Conchamarca, jurisdicción de la provincia de Ambo, a orillas del río Huallaga; a una distancia de 51 km; con una altitud entre 3.700 a 4.000 m.s.n.m.
                        </p>

                </div>
                <div class="d-none" id="perricholi">

                        <p style="text-align:justify !important;" class="mb-2">En la región de Huánuco han surgido personajes notables para la historia del Perú, uno de aquellos personajes fue Doña Micaela Villegas, más conocida como “La Perricholi”, una mujer que con su impresionante belleza robó el corazón del Virrey Amat, de quien fue concubina. Y como aquella fuera una de las hijas notables de Huánuco, no podía dejar de tener en Huánuco una residencia que mostrara sus primeros años de vida, y donde actualmente se asienta un museo que es conocido como “La Casa de la Perricholi”.</p>
                        <p style="text-align:justify !important;" class="mb-2">La Casa de la Perricholi se encuentra en el distrito de Tomayquichua, que se sitúa en la provincia de Ambo. Esta construcción es una pieza de la primera mitad del siglo XVIII, que por la notable mujer que un día poblara sus ambientes, es considerada hoy en día parte del Patrimonio Monumental de la Nación.</p>
                        <p style="text-align:justify !important;" class="mb-2">La Casa de Micaela Villegas Hurtado, es una típica construcción regional que resalta por su buen estado de conservación, así como también por los muebles de época con los que cuenta. La Casa de la Perricholi se encuentra hecha con el uso de adobe, y tiene una privilegiada ubicación, sobre una colina empinada, que permite que el lugar funcione además como un estupendo mirador.</p>
                        <p style="text-align:justify !important;" class="mb-2">Quien visite el museo va a poder conocer la habitación donde durmiera Micaela Villegas, en la que todavía se pueden apreciar algunos muebles de época en conjunto con ropa que se usara en el siglo XVIII en compañía de fotografías que permiten conocer la vida, y parte de los recuerdos de su antigua habitante. Para contribuir a rememorar más la época de la Perricholi, en el lugar se ha construido además una réplica de la antigua cocina de la casona, además de un antiguo carruaje usado por la familia.</p>
                        <p style="text-align:justify !important;" class="mb-2">Si se desea disfrutar de las peculiares celebraciones de este pueblo en relación con la Perricholi, se recomienda visitar la casa el 25 de julio, cuando tiene lugar el Festival de la Perricholi, en la que se realizan actividades como la elección de la Señorita Huánuco, además de exposiciones fotográficas, competencias deportivas, degustación de platos típicos, entre otros.</p>
                        <p style="text-align:justify !important;" class="mb-2">Antes de llegar a la casa de la Perricholi, el visitante va a tener que pasar por la plaza de armas del distrito de Tomayquichua, donde podrá observa una réplica de la casa de la Perricholi hecha en miniatura.</p>

                </div>
                <div class="d-none" id="hatunuchco">

                        <p style="text-align: justify !important;" class="mb-2">
                            Jatun Uchco, una misteriosa cueva en la parte alta del cerro Chanchao Pergaypata, cerca de la capilla del señor de exaltación, a 500 metros al sur de la plaza de armas, en el Distrito de Ambo, desde su ubicación es un lugar que se presta para poder observar panorámicamente toda la ciudad de Ambo y el valle del río Huallaga, como resultado de la confluencia de los ríos Huariaca y Huertas o Chaupihuaranga dándole un atractivo adicional.
                        </p>
                        <p style="text-align: justify !important;" class="mb-2">
                            Jatun Uchco es un término runashimi y significa “Hueco grande” Es considerado hoy no solo un lugar turístico, sino un «yacimiento de restos fósiles» y que hasta ahora no ha podido ser explorada en su totalidad, debido a su profundidad y su peligrosidad que desalienta al explorador e investigador más osado y experimentado a estudiarla. Las cámaras en el interior de la cueva son innumerables e irregulares.
                        </p>

                </div>
                <div class="d-none" id="huancapata">

                        <div class="container mt-3">
                            <p style="text-align: justify !important;" class="mb-2">
                                Construido por los Arquitectos Italianos Santos Benedetti y Lozano Albertini, con piedras y cal, Se culminó su construcción en el año de 1879, tiene una longitud de 25.85 mt. y un ancho de 5.46 mt.
                            </p>
                            <p style="text-align: justify !important;" class="mb-2">
                                Para la construcción del puente fueron empleadas rocas sacadas de diversas canteras (esquistos) y las areniscas en el mismo río Huallaga, lugares de donde probablemente fueron traídas; el 90 % de materiales empleados en la construcción lo conforman las rocas intrusivas o de origen volcánico, (granito).
                            </p>
                            <p style="text-align: justify !important;" class="mb-2">
                                Declarado Patrimonio Cultural de la Nación con R.D. Nº 988/INC DEL 9 De Julio del 2009
                            </p>
                        </div>
                        <h4>
                            UBICACIÓN
                        </h4>      
                        <p style="text-align: justify !important;" class="mb-2">
                            Esta ubicado al noreste de la ciudad de Ambo En las coordenadas UTM, 18l 0368159 E – 8880188, enclavado en el río HUALLAGA, uniendo la ciudad de Ambo con el Centro Poblado de Huancapata.
                        </p>              

                </div>
                <div class="d-none" id="iglesia">
                    <p style="text-align: justify !important;" class="mb-2">
                        En el año 1895 llega la Venerada Imagen de la Santísima Virgen del Carmen de España Ciudad de Los Reyes, llegan tres Vírgenes del Carmen, una de ellas se quedó en la ciudad de Huánuco en la Iglesia de San Cristóbal (Primera Iglesia de Huánuco), otra se encuentra entre los pueblos de Llata y la Unión, y la última imagen se quedó en Ambo, la venerada imagen de la Virgen del Carmen, tiene una gran trayectoria, en primer lugar que es muy Milagrosa según acontecimientos y relatos contados por los fieles.
                    </p>
                    <p style="text-align: justify !important;" class="mb-2">
                        Se dice que cuando llegaron los Chilenos a invadir Ambo y Ayancocha, todo el lugar se cubrió de neblina, donde no se veía nada, entonces no tocaron Ambo por el milagro de la Virgen. En cambio, en Ayancocha se produjo la pelea y tal evento que acabaron caídos muchos peruanos en dicha Batalla, por eso el monumento de Arcopunco es Histórico hasta hoy en día.
                    </p>
                    <p style="text-align: justify !important;" class="mb-2">
                        La Santísima Virgen del Carmen años tras años tiene una gran fiesta que se celebra cada 16 de Julio de cada año. Los primeros años de su vida en esta Tierra Bella y Generosa lo celebraron las festividades los Cerreños haciendo las llamadas corridas de toros en la plaza de armas, ellos con el gran fervor la santísima Virgen del Carmen obsequiaron las coronas tanto de la Virgen y San José, desde ese entonces las festividades lo hacían con mucho amor, porque la virgen del Carmen es milagrosa, desde ese entonces nuestros antepasados lo celebraban con gran solemnidad.
                    </p>
                    <p style="text-align: justify !important;" class="mb-2">
                        Hoy en día muchos fieles expresan su cariño hacia la Madre de Dios, la llaman la “Virgen Milagrosa”, la Virgen Poderosa y otros con mucho cariño la “Mamá Carmen”, hoy en día los Ambinos y Ambinistas siguen con la tradición de festejar con júbilo la fiesta de la Virgen del Carmen, teniendo como devotos a muchos fieles grandes y pequeños, ricos y pobres, la fe es lo que los une teniendo como Mediadora de todas las Gracias a la Santísima Virgen del Carmen “Patrona de Ambo”.
                    </p>
                </div>
                <div class="d-none" id="huampo">

                        <p style="text-align: justify !important;" class="mb-2">
                            La Laguna de HUAMPO, se encuentra ubicado a 2 horas aproximadamente de la Provincia de Ambo a unos 3,800 msnm, tiene valles muy vistosos y cumbres. Se pueden hacer actividades como trekking, paseo en bote y disfrutar de ricos platos típicos de la zona como la trucha frita, el picante de cuy y demás.
                        </p>
 
                </div>
                <div class="d-none" id="rumichaca">

                        <p style="text-align: justify !important;" class="mb-2">
                            Laguna de Huampo, cuyas aguas son reconocidas como de gran pureza, razón por la cual son utilizadas tanto para la elaboración de bebidas gasificadas, como para uso doméstico de la población del lugar.
                        </p>
                        <p style="text-align: justify !important;" class="mb-2">
                            Su clima es frío y seco. Son dos lagunas conocidas como Rumichaca “Hembra” y Rumichaca “Macho” sus aguas cristalinas se vierten en el río Huallaga. El lugar es hábitat de patos andinos, huachuas, entre otras aves y diversos mamíferos entre ellos tarukas, venados, vizcachas, etc. En el trayecto de Coyllar a las Lagunas de Rumichaca, existen bosques de árboles nativos donde destacan el aliso y el sauce, herbáceos, flores de campo y plantas medicinales; asimismo se puede apreciar sembríos de tubérculos, cereales y hortalizas.
                        </p>
                        <h4>UBICACIÓN</h4>
                        <p style="text-align:justify !important;" class="mb-2">
                            Ubicado al este de la Provincia de Ambo, en la región natural Suni a una altitud de 3,916 m.s.n.m.
                        </p>

                </div>
                <div class="d-none" id="arcopunco">
                    <p style="text-align: justify !important;" class="mb-2">
                        Un 18 de marzo de 1812 ocurrió la Batalla de Arcopunco. los pueblos de Ambo, Huánuco, Huamalíes y Pachitea, sublevados en la rebelión de Huánuco, iniciado el 22 de febrero del mismo año, se enfrentaron a las fuerzas realistas armadas y dirigidas por el intendente José González de Prada. La derrota de los insurrectos significó el final de la rebelión que fuera iniciada por el prócer huanuqueño Juan José Crespo y Castillo.
                        Actualmente en Arcopunco, se construyó una alameda con bancas, caseta informativa y jardinería. Se han colocado estatuas de los líderes de la Revolución de Huánuco de 1812 de: “Juan José Crespo y Castillo”, “Marcos Duran Martel”, “Norberto Haro” y “José Rodríguez.”
                    </p>

                </div>
                <div class="d-none" id="atash">

                        <div class="container mt-3">
                            <p style="text-align: justify !important;" class="mb-2">
                                El Complejo arqueológico de Atash forma parte de los atractivos turísticos con los que cuenta el distrito de Huácar, que se encuentra en la provincia de Ambo, departamento de Huánuco. Este complejo es una ciudadela de origen preincaico que se halla a una considerable altura: 3,000 metros sobre el nivel del mar y que se encuentra dentro de los centros arqueológicos declarados Patrimonio Cultural de la Nación.
                            </p>
                            <p style="text-align: justify !important;" class="mb-2">
                                Este lugar, que fuera edificado promediando el Intermedio Tardío, comprende una superficie total de entre 10 a 15 hectáreas que se encuentran divididas en dos sectores reconocibles, el primero de ellos pertenece a las zonas propiamente agrícolas, es decir los espacios destinados a sistemas de andenerías, así como también terrazas agrícolas con canales que permitían la irrigación. Aquellas se encuentran en los cerros próximos al segundo sector de Atash: la zona poblada. La zona agraria del Complejo Arqueológico de Atash puede ser observada desde la plaza que se encuentra en el espacio urbano de la ciudadela, un lugar también ideal para conseguir la mejor toma fotográfica de los alrededores.
                            </p>
                            <p style="text-align: justify !important;" class="mb-2">
                                Esta segunda zona que conforma el complejo arqueológico, se caracteriza por presentar en su espacio un complejo habitacional o residencial, cuyas edificaciones se encuentran hechas con el uso de piedra canteada, aunque no a la perfección, y que se ve necesitada de la utilización de argamasa de barro para conseguir la unión entre las rocas.
                            </p>
                            <p style="text-align: justify !important;" class="mb-2">
                                Se cree que en esta segunda zona se Atash habría vivido el pueblo que se asentara en el sitio de forma permanente. Entre las edificaciones de esta área, además de las casas de los pobladores, se halla asimismo la presencia de un torreón, así como también estructuras en este, que harían pensar que Atash habría sido una ciudad en la que se albergara un observatorio.
                            </p>
                            <p style="text-align: justify !important;" class="mb-2">
                                Sobre la decoración de los muros de Atash es posible decir también que aquellos presentaban especies de nichos u hornacinas interiores, un recurso arquitectónico bastante usado por las culturas prehispánicas con la intención de colocar en ellos a las representaciones de sus deidades protectoras, a quienes rendían culto.
                            </p>
                            <p style="text-align: justify !important;" class="mb-2">
                                Atash también podría haber sido, según algunas hipótesis, un lugar destinado al culto, y en ese sentido haber sido considerado una Huaca, aunque todavía no hay estudios que confirmen lo anterior.
                            </p>
                        </div>
                        <h4>UBICACIÓN</h4>
                        <p style="text-align:justify !important;" class="mb-2">
                            Se ubica a 16 km. del Distrito de Huácar; al suroeste del poblado de Huácar en las cumbres de los cerros Misericordia y Huayrapastana en cuyo seno albergan 4 colinas llamadas Misericordia, Ayajamanan, Atash y Cucagaranán. A una altitud de 3 500 m.
                        </p>

                </div>
            </div>


        </div>



    </section>
<!--====== About Ends ======-->
    @include('componentes.footer')
<script>

document.addEventListener("DOMContentLoaded", function() {
    var enlaces = document.querySelectorAll(".cargar");

    enlaces.forEach(function(enlace) {
        enlace.addEventListener("click", function() {
            var nombreDiv = enlace.getAttribute("data-nombre");
            var contenido = document.getElementById(nombreDiv).innerHTML;
            var divDestino = document.getElementById("contenido");
            divDestino.innerHTML = contenido;

            if (!divDestino.classList.contains("show")) {
                divDestino.classList.toggle("show");
            }else{
                //divDestino.classList.remove("show");
            }

        });
    });



});

</script>

@endsection





