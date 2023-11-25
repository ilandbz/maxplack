<script setup>
  import jwt_decode from 'jwt-decode'
  import { ref, onMounted } from 'vue';
  import { defineTitle } from '@/Helpers';
  import useHelper from '@/Helpers';  
  import useConvocatoria from '@/Composables/convocatoria.js';
  import ContentHeader from '@/Components/ContentHeader.vue';
  import ConvocatoriaForm from './Form.vue'
  import ArchivoForm from './Archivo.vue'
  const { openModal, Toast, Swal, formatoFecha } = useHelper();
  const {
        convocatorias, errors, convocatoria, respuesta,
        obtenerConvocatorias, obtenerConvocatoria, eliminarConvocatoria,
        listaArchivos, archivos,
    } = useConvocatoria();
    const titleHeader = ref({
      titulo: "Convocatorias",
      subTitulo: "",
      icon: "",
      vista: ""
    });
    const dato = ref({
        page:'',
        buscar:'',
        paginacion: 10
    });
    const hoy= formatoFecha(null,"YYYY-MM-DD")
    const form = ref({
        id:'',
        titulo : '',
        descripcion : '',
        tipo_convocatoria_id : '',
        etapa_convocatoria_id : '',
        estado : 'Abierto',
        fecha_inicio : hoy,
        fecha_fin : hoy,
        estadoCrud:'',
        errors:[]
    });
    const formArchivo = ref({
        id  : '',
        titulo : '',
        link : '',
        convocatoria_id: '',
        estadoCrud: '',
        errors:[]
    });
    const limpiar = ()=> {
        form.value.id='',
        form.value.titulo='',
        form.value.descripcion='',
        form.value.tipo_convocatoria_id='',
        form.value.etapa_convocatoria_id='',
        form.value.estado='Abierto',
        form.value.fecha_inicio=hoy,
        form.value.fecha_fin=hoy,
        form.value.estadoCrud = '',          
        form.value.errors = []
        errors.value = []
    }
    const limpiarformArchivo = ()=> {
        formArchivo.value.id='',
        formArchivo.value.titulo='',
        formArchivo.value.link='',
        formArchivo.value.convocatoria_id='',
        formArchivo.value.estadoCrud = '',   
        formArchivo.value.errors = []
        errors.value = []
    }    
    const obtenerDatos = async(id) => {
        await obtenerConvocatoria(id);
        if(convocatoria.value)
        {
            form.value.id=convocatoria.value.id;
            form.value.titulo=convocatoria.value.titulo;
            form.value.descripcion=convocatoria.value.descripcion;
            form.value.tipo_convocatoria_id=convocatoria.value.tipo_convocatoria_id;
            form.value.etapa_convocatoria_id=convocatoria.value.etapa_convocatoria_id;
            form.value.estado=convocatoria.value.estado;
            form.value.fecha_inicio=convocatoria.value.fecha_inicio;
            form.value.fecha_fin=convocatoria.value.fecha_fin;
        }
    }
    const editar = (id) => {
        limpiar();
        obtenerDatos(id)
        form.value.estadoCrud = 'editar'
        document.getElementById("modalconvocatoriaLabel").innerHTML = 'Editar Convocatoria';
        openModal('#modalconvocatoria')
    }
    const nuevo = () => {
        limpiar()
        form.value.estadoCrud = 'nuevo'
        openModal('#modalconvocatoria')
        document.getElementById("modalconvocatoriaLabel").innerHTML = 'Nueva Convocatoria';
    }
    const listarArchivos = async(id) =>{
        await listaArchivos(id)
    }
    const verArchivos = (id)=>{
        limpiarformArchivo()
        formArchivo.value.convocatoria_id=id
        formArchivo.value.estadoCrud = 'nuevo'
        listarArchivos(id)
        openModal('#modalarchivos')
        document.getElementById("modalarchivosLabel").innerHTML = 'Archivos Convocatoria';
    }
    const listarConvocatoria = async(page=1) => {
        dato.value.page= page
        await obtenerConvocatorias(dato.value)
    }
    const eliminar = (id) => {
        Swal.fire({
            title: '¿Estás seguro de Eliminar?',
            text: "Convocatoria",
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
        await eliminarConvocatoria(id)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            listarConvocatoria(convocatorias.value.current_page)
        }
    }
    // PAGINACION
    const isActived = () => {
        return convocatorias.value.current_page
    }
    const offset = 2;

    const buscar = () => {
        listarConvocatoria()
    }
    const cambiarPaginacion = () => {
        listarConvocatoria()
    }
    const cambiarPagina =(pagina) => {
        listarConvocatoria(pagina)
    }
    const pagesNumber = () => {
        if(!convocatorias.value.to){
            return []
        }
        let from = convocatorias.value.current_page - offset
        if(from < 1) from = 1
        let to = from + (offset*2)
        if( to >= convocatorias.value.last_page) to = convocatorias.value.last_page
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
        listarConvocatoria()
    })
</script>
<template>
    <ContentHeader :title-header="titleHeader"></ContentHeader>
    <div class="app-content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h6 class="card-title">
                    Listado de Registros
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
                                <li v-if="convocatorias.current_page >= 2" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Primera Página"
                                        @click.prevent="cambiarPagina(1)">
                                        <span><i class="fas fa-backward-fast"></i></span>
                                    </a>
                                </li>
                                <li v-if="convocatorias.current_page > 1" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Página Anterior"
                                        @click.prevent="cambiarPagina(convocatorias.current_page - 1)">
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
                                <li v-if="convocatorias.current_page < convocatorias.last_page" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        title="Página Siguiente"
                                        @click.prevent="cambiarPagina(convocatorias.current_page + 1)">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </li>
                                    <li v-if="convocatorias.current_page <= convocatorias.last_page-1" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        @click.prevent="cambiarPagina(convocatorias.last_page)"
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
                                        <th colspan="8" class="text-center">Convocatorias</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Titulo</th>
                                        <th>Tipo</th>
                                        <th>Etapa</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="convocatorias.total == 0">
                                        <td class="text-danger text-center" colspan="8">
                                            -- Datos No Registrados - Tabla Vacía --
                                        </td>
                                    </tr>
                                    <tr v-else v-for="(convocatoria,index) in convocatorias.data" :key="convocatoria.id">
                                        <td>{{ index + convocatorias.from }}</td>
                                        <td>{{ convocatoria.titulo }}</td>
                                        <td>{{ convocatoria.tipoconvocatoria.nombre }}</td>
                                        <td>{{ convocatoria.etapaconvocatoria.nombre }}</td>
                                        <td>{{ convocatoria.fecha_inicio }}</td>
                                        <td>{{ convocatoria.fecha_fin }}</td>
                                        <td>{{ convocatoria.estado }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" title="Editar" @click.prevent="editar(convocatoria.id)">
                                                <i class="fas fa-edit"></i>
                                            </button>&nbsp;
                                            <button class="btn btn-danger btn-sm" title="Enviar a Papelera" @click.prevent="eliminar(convocatoria.id)">
                                                <i class="fas fa-trash"></i>
                                            </button>&nbsp;
                                            <button class="btn btn-info btn-sm" title="Ver Archivos" @click.prevent="verArchivos(convocatoria.id)">
                                                <i class="fas fa-eye"></i>
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
                        Mostrando <b>{{convocatorias.from}}</b> a <b>{{ convocatorias.to }}</b> de <b>{{ convocatorias.total}}</b> Registros
                    </div>
                    <div class="col-md-7 mb-1 text-right">
                        <nav>
                            <ul class="pagination">
                                <li v-if="convocatorias.current_page >= 2" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Primera Página"
                                        @click.prevent="cambiarPagina(1)">

                                        <span><i class="fas fa-backward-fast"></i></span>
                                    </a>
                                </li>
                                <li v-if="convocatorias.current_page > 1" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Página Anterior"
                                        @click.prevent="cambiarPagina(convocatorias.current_page - 1)">

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
                                <li v-if="convocatorias.current_page < convocatorias.last_page" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        title="Página Siguiente"
                                        @click.prevent="cambiarPagina(convocatorias.current_page + 1)">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </li>
                                    <li v-if="convocatorias.current_page <= convocatorias.last_page-1" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        @click.prevent="cambiarPagina(convocatorias.last_page)"
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
    <ConvocatoriaForm :form="form" @onListar="listarConvocatoria" :currentPage="convocatorias.current_page"></ConvocatoriaForm>
    <ArchivoForm :form="formArchivo" :archivos="archivos" @onListar="listarArchivos"></ArchivoForm>
</template>