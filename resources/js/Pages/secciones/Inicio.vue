<script setup>
  import jwt_decode from 'jwt-decode'
  import { ref, onMounted } from 'vue';
  import { defineTitle } from '@/Helpers';
  import useHelper from '@/Helpers';  
  import useSeccion from '@/Composables/seccion.js';
  import ContentHeader from '@/Components/ContentHeader.vue';
  import SeccionForm from './Form.vue'
  const { openModal, Toast, Swal } = useHelper();
  const {
        secciones, errors, seccion, respuesta,
        obtenerSecciones, obtenerSeccion, eliminarSeccion
        
    } = useSeccion();
    const titleHeader = ref({
      titulo: "Secciones",
      subTitulo: "",
      icon: "",
      vista: ""
    });
    const dato = ref({
        page:'',
        buscar:'',
        paginacion: 10
    });
    const form = ref({
        id:'',
        titulo : '',
        contenido : `
            <section class="blog-area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-9">
                            <div class="section-title-2 text-center">
                                <h2 class="title">TITULO</h2>
                                <span class="line"></span>
                                <p>Subtitulo</p>
                            </div>
                        </div>
                    </div>
                    <div class="blog-wrapper">
                        <div class="row-wrapper blog-active">
                            <div class="custom-col">
                                <div class="single-blog mt-30">
                                    <div class="blog-image">
                                        <a href="blog-details.html">
                                            <img src="/edumate/assets/images/blog-1.webp" width="370" height="250" alt="blog">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="meta">
                                            <li><a href="#">25 Mayo, 2020</a></li>
                                            <li><a href="#">por: Alex</a></li>
                                            <li><a href="#">12 comentarios</a></li>
                                        </ul>
                                        <h4 class="blog-title"><a href="blog-details.html">Anuncio 1</a></h4>
                                        <a href="blog-details.html" class="more">Leer Mas <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-col">
                                <div class="single-blog mt-30">
                                    <div class="blog-image">
                                        <a href="blog-details.html">
                                            <img src="/edumate/assets/images/blog-2.webp" width="370" height="250" alt="blog">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="meta">
                                            <li><a href="#">25 May, 2020</a></li>
                                            <li><a href="#">por: Alex</a></li>
                                            <li><a href="#">12 comentarios</a></li>
                                        </ul>
                                        <h4 class="blog-title"><a href="blog-details.html">Anuncio 2</a></h4>
                                        <a href="blog-details.html" class="more">Leer Mas <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-col">
                                <div class="single-blog mt-30">
                                    <div class="blog-image">
                                        <a href="blog-details.html">
                                            <img src="/edumate/assets/images/blog-3.webp" width="370" height="250" alt="blog">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="meta">
                                            <li><a href="#">25 May, 2020</a></li>
                                            <li><a href="#">por: Alex</a></li>
                                            <li><a href="#">12 comentarios</a></li>
                                        </ul>
                                        <h4 class="blog-title"><a href="blog-details.html">Anuncio 3</a></h4>
                                        <a href="blog-details.html" class="more">Leer Mas <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        `,
        orden : '',
        estadoCrud:'',
        errors:[]

    });
    const limpiar = ()=> {
        form.value.id='',
        form.value.titulo='',
        form.value.contenido=`
            <section class="blog-area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-9">
                            <div class="section-title-2 text-center">
                                <h2 class="title">TITULO</h2>
                                <span class="line"></span>
                                <p>Subtitulo</p>
                            </div>
                        </div>
                    </div>
                    <div class="blog-wrapper">
                        <div class="row-wrapper blog-active">
                            <div class="custom-col">
                                <div class="single-blog mt-30">
                                    <div class="blog-image">
                                        <a href="blog-details.html">
                                            <img src="/edumate/assets/images/blog-1.webp" width="370" height="250" alt="blog">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="meta">
                                            <li><a href="#">25 Mayo, 2020</a></li>
                                            <li><a href="#">por: Alex</a></li>
                                            <li><a href="#">12 comentarios</a></li>
                                        </ul>
                                        <h4 class="blog-title"><a href="blog-details.html">Anuncio 1</a></h4>
                                        <a href="blog-details.html" class="more">Leer Mas <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-col">
                                <div class="single-blog mt-30">
                                    <div class="blog-image">
                                        <a href="blog-details.html">
                                            <img src="/edumate/assets/images/blog-2.webp" width="370" height="250" alt="blog">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="meta">
                                            <li><a href="#">25 May, 2020</a></li>
                                            <li><a href="#">por: Alex</a></li>
                                            <li><a href="#">12 comentarios</a></li>
                                        </ul>
                                        <h4 class="blog-title"><a href="blog-details.html">Anuncio 2</a></h4>
                                        <a href="blog-details.html" class="more">Leer Mas <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-col">
                                <div class="single-blog mt-30">
                                    <div class="blog-image">
                                        <a href="blog-details.html">
                                            <img src="/edumate/assets/images/blog-3.webp" width="370" height="250" alt="blog">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="meta">
                                            <li><a href="#">25 May, 2020</a></li>
                                            <li><a href="#">por: Alex</a></li>
                                            <li><a href="#">12 comentarios</a></li>
                                        </ul>
                                        <h4 class="blog-title"><a href="blog-details.html">Anuncio 3</a></h4>
                                        <a href="blog-details.html" class="more">Leer Mas <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        `,
        form.value.orden='',
        form.value.estadoCrud = '',          
        form.value.errors = []
        errors.value = []
    }
    const obtenerDatos = async(id) => {
        await obtenerSeccion(id);
        if(seccion.value)
        {
            form.value.id=seccion.value.id;
            form.value.titulo=seccion.value.titulo;
            form.value.contenido=seccion.value.contenido;
            form.value.orden=seccion.value.orden;
        }
    }
    const editar = async(id) => {
        limpiar();
        await obtenerDatos(id)
        form.value.estadoCrud = 'editar'
        document.getElementById("modalseccionLabel").innerHTML = 'Editar Seccion';
        //$('#summernote').html(form.value.contenido);
        // $('.note-editable').html(form.value.contenido);
        $('.note-editable').html(form.value.contenido);
        openModal('#modalseccion')
    }
    const nuevo = () => {
        limpiar()
        form.value.estadoCrud = 'nuevo'
        $('#summernote').html(form.value.contenido);
        $('.note-editable').html(form.value.contenido);
        openModal('#modalseccion')
        document.getElementById("modalseccionLabel").innerHTML = 'Nueva Seccion';
        //titulo.textContent = 'Editar Datos Personales';
    }
    const listarSecciones = async(page=1) => {
        dato.value.page= page
        await obtenerSecciones(dato.value)
    }
    const eliminar = (id) => {
        Swal.fire({
            title: '¿Estás seguro de Eliminar?',
            text: "Seccion",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminalo!'
        }).then((result) => {
            if (result.isConfirmed) {
                elimina(id)
            }
        })
    }
    const elimina = async(id) => {
        await eliminarSeccion(id)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            listarSecciones(secciones.value.current_page)
        }
    }
    // PAGINACION
    const isActived = () => {
        return secciones.value.current_page
    }
    const offset = 2;

    const buscar = () => {
        listarSecciones()
    }
    const cambiarPaginacion = () => {
        listarSecciones()
    }
    const cambiarPagina =(pagina) => {
        listarSecciones(pagina)
    }
    const pagesNumber = () => {
        if(!secciones.value.to){
            return []
        }
        let from = secciones.value.current_page - offset
        if(from < 1) from = 1
        let to = from + (offset*2)
        if( to >= secciones.value.last_page) to = secciones.value.last_page
        let pagesArray = []
        while(from <= to) {
            pagesArray.push(from)
            from ++
        }
        return pagesArray
    }
    // CARGA
    onMounted(() => {
        defineTitle(titleHeader.value.titulo)
        listarSecciones()
    })
</script>
<template>
    <ContentHeader :title-header="titleHeader"></ContentHeader>
    <div class="app-content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h6 class="card-title">
                    Listado de Secciones
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-1 mb-1">
                        <button  type="button" class="btn btn-danger" @click.prevent="nuevo">
                            <i class="fas fa-plus"></i> Nuevo
                        </button>                        
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="input-group mb-1">
                            <span class="input-group-text" id="basic-addon1">Mostrar</span>
                            <select class="form-select"  v-model="dato.paginacion" @change="cambiarPaginacion">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group mb-1">
                            <span class="input-group-text" id="basic-addon1">Buscar</span>
                            <input class="form-control" placeholder="Ingrese nombre, código ciiu" type="text" v-model="dato.buscar"
                                @change="buscar" />
                        </div>
                    </div>
                    <div class="col-md-4 mb-1">
                        <nav>
                            <ul class="pagination">
                                <li v-if="secciones.current_page >= 2" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Primera Página"
                                        @click.prevent="cambiarPagina(1)">
                                        <span><i class="fas fa-backward-fast"></i></span>
                                    </a>
                                </li>
                                <li v-if="secciones.current_page > 1" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Página Anterior"
                                        @click.prevent="cambiarPagina(secciones.current_page - 1)">
                                        <span><i class="fas fa-angle-left"></i></span>
                                    </a>
                                </li>
                                <li v-for="page in pagesNumber()" class="page-item"
                                    :key="page"
                                    :class="[ page == isActived() ? 'active' : '']"
                                    :title="'Página '+ page">
                                    <a href="#" class="page-link"
                                        @click.prevent="cambiarPagina(page)">{{ page }}</a>
                                </li>
                                <li v-if="secciones.current_page < secciones.last_page" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        title="Página Siguiente"
                                        @click.prevent="cambiarPagina(secciones.current_page + 1)">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </li>
                                    <li v-if="secciones.current_page <= secciones.last_page-1" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        @click.prevent="cambiarPagina(secciones.last_page)"
                                        title="Última Página">
                                        <span aria-hidden="true"><i class="fas fa-forward-fast"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-1">
                        <div class="table-responsive">         
                            <table class="table table-bordered table-hover table-sm table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th colspan="7" class="text-center">Secciones</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Titulo</th>
                                        <th>Orden</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="secciones.total == 0">
                                        <td class="text-danger text-center" colspan="7">
                                            -- Datos No Registrados - Tabla Vacía --
                                        </td>
                                    </tr>
                                    <tr v-else v-for="(seccion,index) in secciones.data" :key="seccion.id">
                                        <td>{{ index + secciones.from }}</td>
                                        <td>{{ seccion.titulo }}</td>
                                        <td>{{ seccion.orden }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" title="Editar" @click.prevent="editar(seccion.id)">
                                                <i class="fas fa-edit"></i>
                                            </button>&nbsp;
                                            <button class="btn btn-danger btn-sm" title="Enviar a Papelera" @click.prevent="eliminar(seccion.id)">
                                                <i class="fas fa-trash"></i>
                                            </button>&nbsp;
                                            <button class="btn btn-info btn-sm" title="ver"><i class="fas fa-eye"></i></button>
                                        </td> 
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-1">
                        Mostrando <b>{{secciones.from}}</b> a <b>{{ secciones.to }}</b> de <b>{{ secciones.total}}</b> Registros
                    </div>
                    <div class="col-md-7 mb-1 text-right">
                        <nav>
                            <ul class="pagination">
                                <li v-if="secciones.current_page >= 2" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Primera Página"
                                        @click.prevent="cambiarPagina(1)">

                                        <span><i class="fas fa-backward-fast"></i></span>
                                    </a>
                                </li>
                                <li v-if="secciones.current_page > 1" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Página Anterior"
                                        @click.prevent="cambiarPagina(secciones.current_page - 1)">

                                        <span><i class="fas fa-angle-left"></i></span>
                                    </a>
                                </li>
                                <li v-for="page in pagesNumber()" class="page-item"
                                    :key="page"
                                    :class="[ page == isActived() ? 'active' : '']"
                                    :title="'Página '+ page">
                                    <a href="#" class="page-link"
                                        @click.prevent="cambiarPagina(page)">{{ page }}</a>
                                </li>
                                <li v-if="secciones.current_page < secciones.last_page" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        title="Página Siguiente"
                                        @click.prevent="cambiarPagina(secciones.current_page + 1)">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </li>
                                    <li v-if="secciones.current_page <= secciones.last_page-1" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        @click.prevent="cambiarPagina(secciones.last_page)"
                                        title="Última Página">
                                        <span aria-hidden="true"><i class="fas fa-forward-fast"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <SeccionForm :form="form" @onListar="listarSecciones" :currentPage="secciones.current_page"></SeccionForm>
</template>