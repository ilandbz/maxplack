<script setup>
  import jwt_decode from 'jwt-decode'
  import { ref, onMounted } from 'vue';
  import { defineTitle } from '@/Helpers';
  import useHelper from '@/Helpers';  
  import useComunicado from '@/Composables/comunicado.js';
  import ContentHeader from '@/Components/ContentHeader.vue';
  import ComunicadoForm from './Form.vue'
  const { openModal, Toast, Swal } = useHelper();
  const {
        comunicados, errors, comunicado, respuesta,
        obtenerComunicados, obtenerComunicado, eliminarComunicado,
        carpetaComunicado
    } = useComunicado();
    const titleHeader = ref({
      titulo: "Comunicados",
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
        nombreImagen : carpetaComunicado+'default.webp',
        link : '',
        estadoCrud:'',
        errors:[]

    });
    const limpiar = ()=> {
        form.value.id='',
        form.value.titulo='',
        form.value.nombreImagen=carpetaComunicado+'default.webp',
        form.value.link='',
        form.value.estadoCrud = '',          
        form.value.errors = []
        errors.value = []
    }
    const obtenerDatos = async(id) => {
        await obtenerComunicado(id);
        if(comunicado.value)
        {
            form.value.id=comunicado.value.id;
            form.value.titulo=comunicado.value.titulo;
            form.value.nombreImagen=carpetaComunicado+comunicado.value.nombreImagen;
            form.value.link=comunicado.value.link;
        }
    }
    const editar = (id) => {
        limpiar();
        obtenerDatos(id)
        form.value.estadoCrud = 'editar'
        document.getElementById("modalcomunicadoLabel").innerHTML = 'Editar Comunicado';
        openModal('#modalcomunicado')
    }
    const nuevo = () => {
        limpiar()
        form.value.estadoCrud = 'nuevo'
        openModal('#modalcomunicado')
        document.getElementById("modalcomunicadoLabel").innerHTML = 'Nuevo Comunicado';
        //titulo.textContent = 'Editar Datos Personales';
    }
    const listarComunicados = async(page=1) => {
        dato.value.page= page
        await obtenerComunicados(dato.value)
    }
    const eliminar = (id) => {
        Swal.fire({
            title: '¿Estás seguro de Eliminar?',
            text: "Comunicados",
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
        await eliminarComunicado(id)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            listarComunicados(comunicados.value.current_page)
        }
    }
    // PAGINACION
    const isActived = () => {
        return comunicados.value.current_page
    }
    const offset = 2;

    const buscar = () => {
        listarComunicados()
    }
    const cambiarPaginacion = () => {
        listarComunicados()
    }
    const cambiarPagina =(pagina) => {
        listarComunicados(pagina)
    }
    const pagesNumber = () => {
        if(!comunicados.value.to){
            return []
        }
        let from = comunicados.value.current_page - offset
        if(from < 1) from = 1
        let to = from + (offset*2)
        if( to >= comunicados.value.last_page) to = comunicados.value.last_page
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
        listarComunicados()
    })
</script>
<template>
    <ContentHeader :title-header="titleHeader"></ContentHeader>
    <div class="app-content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h6 class="card-title">
                    Listado de Comunicados
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
                                <li v-if="comunicados.current_page >= 2" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Primera Página"
                                        @click.prevent="cambiarPagina(1)">
                                        <span><i class="fas fa-backward-fast"></i></span>
                                    </a>
                                </li>
                                <li v-if="comunicados.current_page > 1" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Página Anterior"
                                        @click.prevent="cambiarPagina(comunicados.current_page - 1)">
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
                                <li v-if="comunicados.current_page < comunicados.last_page" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        title="Página Siguiente"
                                        @click.prevent="cambiarPagina(comunicados.current_page + 1)">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </li>
                                    <li v-if="comunicados.current_page <= comunicados.last_page-1" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        @click.prevent="cambiarPagina(comunicados.last_page)"
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
                                        <th colspan="7" class="text-center">Comunicados</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Titulo</th>
                                        <th>Imagen</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="comunicados.total == 0">
                                        <td class="text-danger text-center" colspan="7">
                                            -- Datos No Registrados - Tabla Vacía --
                                        </td>
                                    </tr>
                                    <tr v-else v-for="(comunicado,index) in comunicados.data" :key="comunicado.id">
                                        <td>{{ index + comunicados.from }}</td>
                                        <td>{{ comunicado.titulo }}</td>
                                        <td align="center"><img :src="carpetaComunicado + comunicado.nombreImagen" class="img-fluid" style="max-width: 300px;" alt=""></td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" title="Editar" @click.prevent="editar(comunicado.id)">
                                                <i class="fas fa-edit"></i>
                                            </button>&nbsp;
                                            <button class="btn btn-danger btn-sm" title="Eliminar" @click.prevent="eliminar(comunicado.id, 'Temporal')">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-1">
                        Mostrando <b>{{comunicados.from}}</b> a <b>{{ comunicados.to }}</b> de <b>{{ comunicados.total}}</b> Registros
                    </div>
                    <div class="col-md-7 mb-1 text-right">
                        <nav>
                            <ul class="pagination">
                                <li v-if="comunicados.current_page >= 2" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Primera Página"
                                        @click.prevent="cambiarPagina(1)">

                                        <span><i class="fas fa-backward-fast"></i></span>
                                    </a>
                                </li>
                                <li v-if="comunicados.current_page > 1" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Página Anterior"
                                        @click.prevent="cambiarPagina(comunicados.current_page - 1)">

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
                                <li v-if="comunicados.current_page < comunicados.last_page" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        title="Página Siguiente"
                                        @click.prevent="cambiarPagina(comunicados.current_page + 1)">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </li>
                                    <li v-if="comunicados.current_page <= comunicados.last_page-1" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        @click.prevent="cambiarPagina(comunicados.last_page)"
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
    <ComunicadoForm :form="form" @onListar="listarComunicados" :currentPage="comunicados.current_page"></ComunicadoForm>
</template>