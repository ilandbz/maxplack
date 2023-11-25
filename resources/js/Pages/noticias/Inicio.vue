<script setup>
  import useNoticia from '@/Composables/noticia.js';
  import NoticiaForm from './Form.vue'
  import Imagenform from './Imagen.vue'
  import useHelper from '@/Helpers';  
  import ContentHeader from '@/Components/ContentHeader.vue';
  import { ref, onMounted } from 'vue';
  const { openModal, Toast, Swal } = useHelper();
  const {
        errors, noticias, noticia, 
        obtenerNoticia, obtenerNoticias, 
        eliminarNoticia,obtenerImagenes, imagenes,
        respuesta, carpetaNoticias
    } = useNoticia();
    const titleHeader = ref({
      titulo: "Noticias",
      subTitulo: "",
      icon: "fas fa-newspaper",
      vista: ""
    });
    const form = ref({
        id:'',
        titulo:'',
        subtitulo : '',
        slug : '',
        contenido : '',
        imagen_id:'',
        imagen: carpetaNoticias+'default.webp',
        estadoCrud:'',
        errors:[]
    });
    
    const formimagen = ref({
        id:'',
        noticia_id:'',
        nombreimagen:carpetaNoticias+'default.webp',
        errors:[]
    });
    const limpiar = ()=> {
        form.value.id='',
        form.value.titulo='',
        form.value.subtitulo='',
        form.value.slug='',
        form.value.contenido='',
        form.value.imagen_id='',
        form.value.imagen=carpetaNoticias+'default.webp',
        form.value.estadoCrud = '',
        form.value.errors = []
        errors.value = []
    }
    const obtenerDatos = async(id) => {
        await obtenerNoticia(id);
        if(noticia.value)
        {
            form.value.id=noticia.value.id;
            form.value.titulo=noticia.value.titulo;
            form.value.subtitulo=noticia.value.subtitulo;
            form.value.slug=noticia.value.slug;
            form.value.contenido=noticia.value.contenido;
            form.value.imagen_id=noticia.value.imagen.id 
            form.value.imagen=carpetaNoticias+noticia.value.imagen.nombreimagen
        }
    }
    const editar = async(id) => {
        limpiar();
        await obtenerDatos(id)
        form.value.estadoCrud = 'editar'
        document.getElementById("modalnoticiaLabel").innerHTML = 'Editar Noticia';
        $('#summernote').html(form.value.contenido);
        $('.note-editable').html(form.value.contenido);
        openModal('#modalnoticia')
    }
    const nuevo = () => {
        limpiar()
        form.value.estadoCrud = 'nuevo'
        openModal('#modalnoticia')
        document.getElementById("modalnoticiaLabel").innerHTML = 'Nueva Noticia';
    }
    const listaImagenes = async(id) =>{
        await obtenerImagenes(id)
    }
    const nuevaImagen = (id) => {
        formimagen.value.noticia_id = id
        formimagen.value.nombreimagen=carpetaNoticias+'default.webp'
        document.getElementById("modalimagenLabel").innerHTML = 'Nueva Imagen';
        listaImagenes(id)
        openModal('#modalimagen')
    }    
    const listarNoticias = async(page=1) => {
        dato.value.page= page
        await obtenerNoticias(dato.value)
    }

    const eliminar = (id) => {
        Swal.fire({
            title: '¿Estás seguro de Eliminar?',
            text: "Noticias",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminalo!'
        }).then((result) => {
            if (result.isConfirmed) {
                eliminaNoticia(id)

            }
        })
    }
    const eliminaNoticia = async(id) =>{
        await eliminarNoticia(id)
        if(respuesta.value.ok==1)
        {
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            listarNoticias()
        }
    }
    //paginacion
    const isActived = () => {
        return noticias.value.current_page
    }
    const offset = 2;
    const dato = ref({
        page:'',
        buscar:'',
        paginacion: 10
    });
    const buscar = () => {
        listarNoticias()
    }
    const cambiarPaginacion = () => {
        listarNoticias()
    }
    const cambiarPagina =(pagina) => {
        listarNoticias(pagina)
    }
    const pagesNumber = () => {
        if(!noticias.value.to){
            return []
        }
        let from = noticias.value.current_page - offset
        if(from < 1) from = 1
        let to = from + (offset*2)
        if( to >= noticias.value.last_page) to = noticias.value.last_page
        let pagesArray = []
        while(from <= to) {
            pagesArray.push(from)
            from ++
        }
        return pagesArray
    }
    // CARGA
    onMounted(() => {
        listarNoticias()
    })
</script>
<template>
    <ContentHeader :title-header="titleHeader"></ContentHeader>
    <div class="app-content">
      <div class="container-fluid">
        <div class="card card-primary card-outline mt-2">
            <div class="card-header">
                <h6 class="card-title">
                    Listado de Noticias
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    
                </div>
                <div class="row">
                    <div class="col-md-1 mb-1">
                        <button  type="button" class="btn btn-danger" @click.prevent="nuevo">
                            <i class="fas fa-plus"></i> Nuevo
                        </button>                        
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="input-group mb-1">
                            <span class="input-group-text" id="basic-addon1">Pag.</span>
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
                    <div class="col-md-3">

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
                                <li v-if="noticias.current_page >= 2" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Primera Página"
                                        @click.prevent="cambiarPagina(1)">
                                        <span><i class="fas fa-backward-fast"></i></span>
                                    </a>
                                </li>
                                <li v-if="noticias.current_page > 1" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Página Anterior"
                                        @click.prevent="cambiarPagina(noticias.current_page - 1)">
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
                                <li v-if="noticias.current_page < noticias.last_page" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        title="Página Siguiente"
                                        @click.prevent="cambiarPagina(noticias.current_page + 1)">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </li>
                                    <li v-if="noticias.current_page <= noticias.last_page-1" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        @click.prevent="cambiarPagina(noticias.last_page)"
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
                                        <th colspan="7" class="text-center">Noticias</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Titulo</th>
                                        <th>Subtitulo</th>
                                        <th>Slug</th>
                                        <th>Contenido</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="noticias.total == 0">
                                        <td class="text-danger text-center" colspan="7">
                                            -- Datos No Registrados - Tabla Vacía --
                                        </td>
                                    </tr>
                                    <tr v-else v-for="(noticia,index) in noticias.data" :key="noticia.id">
                                        <td>{{ index + noticias.from }}</td>
                                        <td>{{ noticia.titulo }}</td>
                                        <td>
                                            <template v-if="noticia.subtitulo.length > 60">
                                                {{ noticia.subtitulo.substring(0, 60) + '...' }}
                                            </template>
                                            <template v-else>
                                                {{ noticia.subtitulo }}
                                            </template>
                                        </td>
                                        <td>{{ noticia.slug }}</td>
                                        <td>
                                            <template v-if="noticia.contenido.length > 20">
                                                {{ noticia.contenido.substring(0, 60) + '...' }}
                                            </template>
                                            <template v-else>
                                                {{ noticia.contenido }}
                                            </template>
                                        </td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" title="Editar" @click.prevent="editar(noticia.id)">
                                                <i class="fas fa-edit"></i>
                                            </button>&nbsp;
                                            <button class="btn btn-danger btn-sm" title="Eliminar" @click.prevent="eliminar(noticia.id)">
                                                <i class="fas fa-trash"></i>
                                            </button>&nbsp;
                                            <button class="btn btn-primary btn-sm" title="Agregar Imagenes" @click.prevent="nuevaImagen(noticia.id)">
                                                <i class="fas fa-camera"></i>
                                            </button>&nbsp;
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-1">
                        Mostrando <b>{{noticias.from}}</b> a <b>{{ noticias.to }}</b> de <b>{{ noticias.total}}</b> Registros
                    </div>
                    <div class="col-md-7 mb-1 text-right">
                        <nav>
                            <ul class="pagination">
                                <li v-if="noticias.current_page >= 2" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Primera Página"
                                        @click.prevent="cambiarPagina(1)">

                                        <span><i class="fas fa-backward-fast"></i></span>
                                    </a>
                                </li>
                                <li v-if="noticias.current_page > 1" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Página Anterior"
                                        @click.prevent="cambiarPagina(noticias.current_page - 1)">

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
                                <li v-if="noticias.current_page < noticias.last_page" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        title="Página Siguiente"
                                        @click.prevent="cambiarPagina(noticias.current_page + 1)">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </li>
                                    <li v-if="noticias.current_page <= noticias.last_page-1" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        @click.prevent="cambiarPagina(noticias.last_page)"
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
        <NoticiaForm :form="form" @onListar="listarNoticias" :currentPage="noticias.current_page"></NoticiaForm>
        <Imagenform :form="formimagen" :imagenes="imagenes" @cargarImagenes="listaImagenes"></Imagenform>
      </div>
    </div>





</template>