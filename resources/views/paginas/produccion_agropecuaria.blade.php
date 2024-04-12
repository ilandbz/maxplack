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
                            <img src="imagenes/prodagr.jpg" alt="About">
                            <img class="react__shape__ab" src="storage/imagenes/loader.png" width="100" alt="Max Planck">
                        </div>

                        <img src="imagenes/prodagropecuaria.jpg" class="img-fluid img-thmbnail" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content">
                            <h4 class="about__title">Produccion Agropecuaria</h4>
                            <p class="about__paragraph">
                                El Profesional Técnico en Producción Agropecuaria está capacitado para prestar servicio en el campo agropecuario realizando las siguientes funciones: Planifica, Organiza, Ejecuta, Supervisa, Evalúa e Investiga las operaciones de producción agrícola y pecuaria, obteniendo productos de calidad y vigilando el cumplimiento de las normas de seguridad e higiene así como la conservación del medio ambiente de la misma manera tiene la capacidad de realizar su trabajo en equipo respetando a las personas de su entorno ejerciendo sus derechos con gran responsabilidad cumpliendo sus obligaciones laborales.
                            </p>
                            <p class="about__paragraph">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Duración de Estudios</th>
                                            <td>3 años</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Título a Nombre de la Nación</th>
                                            <td>Profesional Técnico en Producción Agropecuaria</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Certificación</th>
                                            <td>Por Módulos Profesionales</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table>
                                    <tbody>
                                        <tr>
                                            <th colspan="2">Perfil del Ingresante</th>
                                        </tr>
                                        <tr>
                                            <th>Ítem</th>
                                            <th>Descripción</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Tener los conocimientos básicos adquiridos en la Educación Básica Regular en el Nivel Secundario como: Matemática, Comunicación, Biología, Química, Anatomía Animal, Botánica y Cultura General.</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Contar con habilidades y comunicación para la socialización con los integrantes del Programa de Estudios para realizar trabajo en equipo.</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Práctica de valores: Honradez, Puntualidad, Responsabilidad, Respeto, Honestidad para la buena convivencia y formación en el Programa de Estudios elegidos.</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Tener habilidad y destreza de acuerdo con su vocación para su formación profesional como Técnico en Producción Agropecuaria.</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Práctica de liderazgo para contribuir al desarrollo de las Unidades Didácticas en el Programa de Estudios.</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Tener capacidad de solucionar problemas encontradas durante su formación en sus Experiencias Formativas en Situaciones Reales de Trabajo para contribuir en la producción de las instituciones públicas y privadas.</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Actitud para realizar trabajos de investigación e innovación tecnológicas adquiridas en su formación en el nivel secundario.</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Cuidar el medio ambiente evitando la contaminación para tener una buena calidad de vida.</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </p>
                            <div class="objectives">
                                <h4>OBJETIVOS DEL PROGRAMA DE ESTUDIOS DE PRODUCCIÓN AGROPECUARIA</h4>
                                <ol>
                                    <li>Formar profesionales técnicos competitivos con conocimientos en las áreas agrícolas y pecuarias para elevar el nivel de la producción.</li>
                                    <li>Orientar al estudiante para el desarrollo de sus capacidades e impulsar la investigación e innovación tecnológica.</li>
                                    <li>Contribuir a la formación socioeconómica y cultural con una actitud dentro del ámbito local y regional.</li>
                                    <li>Formar profesionales capaces de generar sus actividades agrícolas y pecuarias.</li>
                                </ol>
                            
                                <h4>PROPÓSITOS DEL PROGRAMA DE ESTUDIOS DE PRODUCCIÓN AGROPECUARIA</h4>
                                <ol>
                                    <li>Formar profesionales técnicos en producción agropecuaria con la capacidad de brindar asesoramiento con transferencia tecnológica a las comunidades campesinas.</li>
                                    <li>Preparar técnicos con la capacidad de crear pequeñas empresas en las áreas agrícolas y pecuarias como fuente de trabajo.</li>
                                    <li>Ser competente para organizar, dirigir y administrar empresas agropecuarias públicas y privadas para elevar la producción agrícola y pecuaria.</li>
                                    <li>El egresado como técnico agropecuario estará en la capacidad de seguir superándose como profesional en las Universidades del País, logrando títulos profesionales de Ing. Agrónomo, Ing. Zootecnista, Med. Veterinario, Ing. Ambiental, etc.</li>
                                </ol>
                            </div>
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