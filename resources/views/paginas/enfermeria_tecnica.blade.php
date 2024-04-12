@extends('layout')

@section('body-content')
<!--================= Wrapper Start Here =================-->
<div class="react-wrapper">
    <div class="react-wrapper-inner">
        <!--================= Breadcrumbs Section Start Here =================-->
        <div class="react-breadcrumbs">
            <div class="breadcrumbs-wrap">
                <img class="desktop" src="maxplanck/assets/images/breadcrumbs/1.jpg" alt="Breadcrumbs">
                <img class="mobile" src="maxplanck/assets/images/breadcrumbs/1.jpg" alt="Breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="container">
                        <div class="breadcrumbs-text">
                            <h1 class="breadcrumbs-title">{{$titulo}}</h1>
                            <div class="back-nav">
                                <ul>
                                    <li><a href="">Home</a></li>
                                    <li>{{$titulo}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
        <!--================= Breadcrumbs Section End Here =================-->

        <!--=================  About Section Start Here ================= -->
        <div class="about__area about__area_one p-relative pt---100 pb---120">
            <div class="container">                        
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about__image">
                            <br>
                            <br>
                            <br>
                            <img src="imagenes/enftecnica.jpg" class="img-fluid img-thmbnail" alt="">
                            <img class="react__shape__ab" src="storage/imagenes/loader.png" width="100" alt="Max Planck">
                        </div>

                        
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content">
                            <h4 class="about__title">ENFERMERIA TECNICA</h4>
                            <p class="about__paragraph">
                                El Profesional Técnico en Enfermería al concluir sus tres años de formación estará preparado para:
                                Realizar servicios para la prevención y promoción de la salud, así como de enfermería técnica asistencial, aplicando normas de bioseguridad, trabajando en equipo con principios ético morales en el ejercicio profesional, contribuyendo a lograr personas, familias y ambientes saludables.
                                Colaborando en todo el proceso que se realizan para dar atención al paciente de acuerdo a protocolos establecidos en todos los ciclos de la vida del ser humano, con diferentes patologías con responsabilidad, adaptándose a situaciones laborales generadas como consecuencias de cambio de las innovaciones tecnológicas, tomando decisiones inmediatas y acertadas ante problemas relacionados con su trabajo.
                            </p>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th colspan="2">Duración de Estudios</th>
                                        <td>3 años</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Título a Nombre de la Nación</th>
                                        <td>Profesional Técnico en Enfermería Técnica</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Certificación</th>
                                        <td>Por Módulos Profesionales</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="dimensions">
                                <h4>a) En la Dimensión cognitiva</h4>
                                <li>Conocimientos básicos de matemáticas</li>
                                <li>Conocimientos básicos de la ciencia de la salud, Biología, Química, Anatomía y Fisiología Humana.</li>
                                <li>Habilidades para la comunicación efectiva verbal y escrita, trabajo en equipo, comprensión de textos y capacidad de observación</li>
                                <li>Actitud para la investigación tecnológica con conocimiento de métodos lógicos</li>
                                <br>
                            
                                <h4>b) En la dimensión sociocultural</h4>

                                <li>Adaptación rápida a las características de los diferentes ámbitos en que se desarrolle sus actividades</li>
                                <li>Habilidades para la comunicación efectiva verbal y escrita, trabajo en equipo, comprensión de textos y capacidades de observación</li>
                                <li>Actitud para la investigación tecnológica con conocimiento de métodos lógicos</li>
                                <br>
                                <h4>c) En la dimensión afectiva</h4>
                                <li>Actitudes y valores: compromiso social, responsabilidad, vocación de servicio, solidaridad, humanismo, comprensión y tolerancia hacia la diversidad y respeto a la vida a la dignidad humana</li>
                                <li>Proactivo, respeto a la dignidad de la persona y la interculturalidad</li>
                                <li>Consciente de su rol presente y futuro, en el proceso de desarrollo y conservación del medio ambiente</li>
                                <br>
                            </div>


                            <div class="performance-areas">
                                <h4>ÁMBITOS DE DESEMPEÑO</h4>

                            </div>

                            <li>Centros y Puestos De Salud en Atención Primaria</li>
                            <li>Hospital</li>
                            <li>Clínicas de Salud</li>
                            <li>Consultorios Médicos de Especialidad</li>
                            <li>Empresas Agroindustriales: Tópicos</li>
                            <li>Boticas: en Triaje y Tópico</li>
                            <li>Casa de Reposo: en Geriatría</li>
                            <li>Atención Particular del profesional técnico de enfermería al niño y adulto mayor</li>
                            <li>Instituciones Educativas: Tópicos</li>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--================= About Section End Here ================= -->

        
    </div>
</div>
<!--================= Wrapper End Here =================-->
@include('componentes.footer')
@endsection