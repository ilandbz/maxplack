<script setup>
  import jwt_decode from 'jwt-decode'
  import { ref, onMounted } from 'vue';
  import { defineTitle } from '@/Helpers';
  import useHelper from '@/Helpers';  
  import usePopup from '@/Composables/popup.js';
  import ContentHeader from '@/Components/ContentHeader.vue';
  import PopupForm from './Form.vue'
  import ImagenForm from './Imagen.vue'
  const { openModal, Toast, Swal } = useHelper();
  const {
        popups, errors, popup, respuesta,
        obtenerPopups, obtenerPopup, eliminarPopup,
        carpetaPopup, obtenerImagenes, imagenes
    } = usePopup();
    const titleHeader = ref({
      titulo: "Popup",
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
        link : '',
        estadoCrud:'',
        errors:[]
    });
    const formImagen = ref({
        id:'',
        nombreImagen : '',
        popup_id : '',
        estadoCrud:'',
        errors:[]
    });
    const limpiar = ()=> {
        form.value.id='',
        form.value.titulo='',
        form.value.link='',
        form.value.estadoCrud = '',          
        form.value.errors = []
        errors.value = []
    }
    // const limpiarformImagen = () => {
    //     formImagen.value.id='',
    //     formImagen.value.nombreImagen='',
    //     formImagen.value.popup_id='',
    //     formImagen.value.estadoCrud = '',          
    //     formImagen.value.errors = []
    //     errors.value = []        
    // };
    const listaImagenes = async(id) =>{
        await obtenerImagenes(id)
    }
    const nuevaImagen = (id) => {
        formImagen.value.popup_id = id
        formImagen.value.nombreImagen=carpetaPopup+'default.webp'
        document.getElementById("modalimagenLabel").innerHTML = 'Nueva Imagen';
        listaImagenes(id)
        openModal('#modalimagen')
        console.log(imagenes.value)
    }  
    const obtenerDatos = async(id) => {
        await obtenerPopup(id);
        if(popup.value)
        {
            form.value.id=popup.value.id;
            form.value.titulo=popup.value.titulo;
            form.value.link=popup.value.link;
        }
    }
    const editar = (id) => {
        limpiar();
        obtenerDatos(id)
        form.value.estadoCrud = 'editar'
        document.getElementById("modalpopupLabel").innerHTML = 'Editar Popup';
        openModal('#modalpopup')
    }
    const nuevo = () => {
        limpiar()
        form.value.estadoCrud = 'nuevo'
        openModal('#modalpopup')
        document.getElementById("modalpopupLabel").innerHTML = 'Nuevo Popup';
        //titulo.textContent = 'Editar Datos Personales';
    }
    const listarPopups = async(page=1) => {
        dato.value.page= page
        await obtenerPopups(dato.value)
    }
    const eliminar = (id) => {
        Swal.fire({
            title: '¿Estás seguro de Eliminar?',
            text: "Popup",
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
        await eliminarPopup(id)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            listarPopups(popups.value.current_page)
        }
    }
    // PAGINACION
    const isActived = () => {
        return popups.value.current_page
    }
    const offset = 2;

    const buscar = () => {
        listarPopups()
    }
    const cambiarPaginacion = () => {
        listarPopups()
    }
    const cambiarPagina =(pagina) => {
        listarPopups(pagina)
    }
    const pagesNumber = () => {
        if(!popups.value.to){
            return []
        }
        let from = popups.value.current_page - offset
        if(from < 1) from = 1
        let to = from + (offset*2)
        if( to >= popups.value.last_page) to = popups.value.last_page
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
        listarPopups()
    })
</script>
<template>
    <ContentHeader :title-header="titleHeader"></ContentHeader>
    <div class="app-content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h6 class="card-title">
                    Listado de Popups
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
                                <li v-if="popups.current_page >= 2" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Primera Página"
                                        @click.prevent="cambiarPagina(1)">
                                        <span><i class="fas fa-backward-fast"></i></span>
                                    </a>
                                </li>
                                <li v-if="popups.current_page > 1" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Página Anterior"
                                        @click.prevent="cambiarPagina(popups.current_page - 1)">
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
                                <li v-if="popups.current_page < popups.last_page" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        title="Página Siguiente"
                                        @click.prevent="cambiarPagina(popups.current_page + 1)">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </li>
                                    <li v-if="popups.current_page <= popups.last_page-1" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        @click.prevent="cambiarPagina(popups.last_page)"
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
                                        <th colspan="7" class="text-center">Popups</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Titulo</th>
                                        <th>Link</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="popups.total == 0">
                                        <td class="text-danger text-center" colspan="7">
                                            -- Datos No Registrados - Tabla Vacía --
                                        </td>
                                    </tr>
                                    <tr v-else v-for="(popup,index) in popups.data" :key="popup.id">
                                        <td>{{ index + popups.from }}</td>
                                        <td>{{ popup.titulo }}</td>
                                        <td><a target="_blank" :title="popup.link" :href="popup.link"><i class="fas fa-link"></i></a> </td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" title="Editar" @click.prevent="editar(popup.id)">
                                                <i class="fas fa-edit"></i>
                                            </button>&nbsp;
                                            <button class="btn btn-danger btn-sm" title="Enviar a Papelera" @click.prevent="eliminar(popup.id)">
                                                <i class="fas fa-trash"></i>
                                            </button>&nbsp;
                                            <button class="btn btn-primary btn-sm" title="Agregar Imagenes" @click.prevent="nuevaImagen(popup.id)">
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
                        Mostrando <b>{{popups.from}}</b> a <b>{{ popups.to }}</b> de <b>{{ popups.total}}</b> Registros
                    </div>
                    <div class="col-md-7 mb-1 text-right">
                        <nav>
                            <ul class="pagination">
                                <li v-if="popups.current_page >= 2" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Primera Página"
                                        @click.prevent="cambiarPagina(1)">

                                        <span><i class="fas fa-backward-fast"></i></span>
                                    </a>
                                </li>
                                <li v-if="popups.current_page > 1" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Página Anterior"
                                        @click.prevent="cambiarPagina(popups.current_page - 1)">

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
                                <li v-if="popups.current_page < popups.last_page" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        title="Página Siguiente"
                                        @click.prevent="cambiarPagina(popups.current_page + 1)">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </li>
                                    <li v-if="popups.current_page <= popups.last_page-1" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        @click.prevent="cambiarPagina(popups.last_page)"
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
    <PopupForm :form="form" @onListar="listarPopups" :currentPage="popups.current_page"></PopupForm>
    <ImagenForm :form="formImagen" :imagenes="imagenes" @cargarImagenes="listaImagenes"></ImagenForm>
</template>