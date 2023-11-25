<script setup>
  import useArchivo from '@/Composables/archivos.js';
  import ArchivoForm from './Form.vue'
  import useHelper from '@/Helpers';  
  import Clipboard from 'clipboard';
  import ContentHeader from '@/Components/ContentHeader.vue';
  import { ref, onMounted } from 'vue';
  const { openModal, Toast, Swal } = useHelper();
  const titleHeader = ref({
      titulo: "Archivos",
      subTitulo: "",
      icon: "",
      vista: ""
    });
  const {
        errors, archivos, archivo, 
        obtenerArchivo, obtenerArchivos, 
        eliminarArchivo,
        respuesta, carpetaArchivos
    } = useArchivo();
    const form = ref({
        id:'',
        titulo:'',
        descripcion : '',
        nombrearchivo: '',
        archivo:'',
        estadoCrud:'',
        errors:[]
    });
    const limpiar = ()=> {
        form.value.id='',
        form.value.titulo='',
        form.value.descripcion='',
        form.value.nombrearchivo='',
        form.value.archivo='',
        form.value.estadoCrud = '',
        form.value.errors = []
        errors.value = []
    }
    const obtenerDatos = async(id) => {
        await obtenerArchivo(id);
        if(archivo.value)
        {
            form.value.id=archivo.value.id;
            form.value.titulo=archivo.value.titulo;
            form.value.descripcion=archivo.value.descripcion;
            form.value.nombrearchivo=carpetaArchivos+archivo.value.nombrearchivo;
        }
    }
    const editar = (id) => {
        limpiar();
        obtenerDatos(id)
        form.value.estadoCrud = 'editar'
        document.getElementById("modalarchivoLabel").innerHTML = 'Editar Archivo';
        openModal('#modalarchivo')
    }
    const nuevo = () => {
        limpiar()
        form.value.estadoCrud = 'nuevo'
        openModal('#modalarchivo')
        document.getElementById("modalarchivoLabel").innerHTML = 'Nuevo Archivo';
    }
    const listarArchivos = async(page=1) => {
        dato.value.page= page
        await obtenerArchivos(dato.value)
    }

    const eliminar = (id) => {
        Swal.fire({
            title: '¿Estás seguro de Eliminar?',
            text: "Archivo",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminalo!'
        }).then((result) => {
            if (result.isConfirmed) {
                eliminaArchivo(id)

            }
        })
    }
    const eliminaArchivo = async(id) =>{
        await eliminarArchivo(id)
        if(respuesta.value.ok==1)
        {
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            listarArchivos()
        }
    }
    //paginacion
    const isActived = () => {
        return archivos.value.current_page
    }
    const offset = 2;
    const dato = ref({
        page:'',
        buscar:'',
        paginacion: 10
    });
    const buscar = () => {
        listarArchivos()
    }
    const cambiarPaginacion = () => {
        listarArchivos()
    }
    const cambiarPagina =(pagina) => {
        listarArchivos(pagina)
    }
    const pagesNumber = () => {
        if(!archivos.value.to){
            return []
        }
        let from = archivos.value.current_page - offset
        if(from < 1) from = 1
        let to = from + (offset*2)
        if( to >= archivos.value.last_page) to = archivos.value.last_page
        let pagesArray = []
        while(from <= to) {
            pagesArray.push(from)
            from ++
        }
        return pagesArray
    }
    // CARGA
    onMounted(() => {
        listarArchivos()
    })
    const iconoSegunExtension = (nombreArchivo) => {
        const extension = nombreArchivo.split('.').pop().toLowerCase();
        if (['pdf'].includes(extension)) {
        return 'fas fa-file-pdf'; 
        } else if (['doc', 'docx'].includes(extension)) {
        return 'fas fa-file-word'; 
        } else if (['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(extension)) {
        return 'fas fa-file-image';
        } else {
        return 'fas fa-file'; 
        }
    }
    const obtenerUrlCompleta=(rutaArchivo)=>{
    const dominio = `${window.location.protocol}//${window.location.host}`;
      //const dominio = 'http://127.0.0.1:8000';
      return dominio + rutaArchivo;
    }
    const copiarAlPortapapeles = (enlace) => {
     const clipboard = new Clipboard('.btn-primary', {
        text: function () {
          return enlace;
        }
      });

      clipboard.on('success', function (e) {
        console.log('Texto copiado al portapapeles:', e.text);
        clipboard.destroy(); // ¡Importante! Destruir el objeto Clipboard después de copiar
      });

      clipboard.on('error', function (e) {
        console.error('Error al copiar al portapapeles:', e);
        clipboard.destroy(); // ¡Importante! Destruir el objeto Clipboard en caso de error
      });

    }
  
</script>
<template>
    <ContentHeader :title-header="titleHeader"></ContentHeader>
    <div class="app-content">
        <div class="container-fluid">
            <div class="card card-primary card-outline mt-2">
                <div class="card-header">
                    <h6 class="card-title">
                        Listado de Archivos
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
                                    <li v-if="archivos.current_page >= 2" class="page-item">
                                        <a href="#" aria-label="Previous" class="page-link"
                                            title="Primera Página"
                                            @click.prevent="cambiarPagina(1)">
                                            <span><i class="fas fa-backward-fast"></i></span>
                                        </a>
                                    </li>
                                    <li v-if="archivos.current_page > 1" class="page-item">
                                        <a href="#" aria-label="Previous" class="page-link"
                                            title="Página Anterior"
                                            @click.prevent="cambiarPagina(archivos.current_page - 1)">
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
                                    <li v-if="archivos.current_page < archivos.last_page" class="page-item">
                                        <a href="#" aria-label="Next" class="page-link"
                                            title="Página Siguiente"
                                            @click.prevent="cambiarPagina(archivos.current_page + 1)">
                                            <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                        </a>
                                    </li>
                                        <li v-if="archivos.current_page <= archivos.last_page-1" class="page-item">
                                        <a href="#" aria-label="Next" class="page-link"
                                            @click.prevent="cambiarPagina(archivos.last_page)"
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
                                            <th colspan="7" class="text-center">Archivos</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Titulo</th>
                                            <th>Descripcion</th>
                                            <th>Acceder</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-if="archivos.total == 0">
                                            <td class="text-danger text-center" colspan="7">
                                                -- Datos No Registrados - Tabla Vacía --
                                            </td>
                                        </tr>
                                        <tr v-else v-for="(archivo,index) in archivos.data" :key="archivo.id">
                                            <td>{{ index + archivos.from }}</td>
                                            <td>{{ archivo.titulo }}</td>
                                            <td>{{ archivo.descripcion }}</td>
                                            <td>
                                                <a target="_blank" :href="carpetaArchivos + archivo.nombrearchivo">
                                                <i :class="iconoSegunExtension(archivo.nombrearchivo)"></i> Descargar
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" title="Editar" @click.prevent="editar(archivo.id)">
                                                    <i class="fas fa-edit"></i>
                                                </button>&nbsp;
                                                <button class="btn btn-danger btn-sm" title="Eliminar" @click.prevent="eliminar(archivo.id)">
                                                    <i class="fas fa-trash"></i>
                                                </button>&nbsp;
                                                <button title="Copiar Enlace" class="btn btn-primary btn-sm" @click="copiarAlPortapapeles(obtenerUrlCompleta(carpetaArchivos + archivo.nombrearchivo))">
                                                <i class="far fa-copy"></i>
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
                            Mostrando <b>{{archivos.from}}</b> a <b>{{ archivos.to }}</b> de <b>{{ archivos.total}}</b> Registros
                        </div>
                        <div class="col-md-7 mb-1 text-right">
                            <nav>
                                <ul class="pagination">
                                    <li v-if="archivos.current_page >= 2" class="page-item">
                                        <a href="#" aria-label="Previous" class="page-link"
                                            title="Primera Página"
                                            @click.prevent="cambiarPagina(1)">
        
                                            <span><i class="fas fa-backward-fast"></i></span>
                                        </a>
                                    </li>
                                    <li v-if="archivos.current_page > 1" class="page-item">
                                        <a href="#" aria-label="Previous" class="page-link"
                                            title="Página Anterior"
                                            @click.prevent="cambiarPagina(archivos.current_page - 1)">
        
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
                                    <li v-if="archivos.current_page < archivos.last_page" class="page-item">
                                        <a href="#" aria-label="Next" class="page-link"
                                            title="Página Siguiente"
                                            @click.prevent="cambiarPagina(archivos.current_page + 1)">
                                            <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                        </a>
                                    </li>
                                        <li v-if="archivos.current_page <= archivos.last_page-1" class="page-item">
                                        <a href="#" aria-label="Next" class="page-link"
                                            @click.prevent="cambiarPagina(archivos.last_page)"
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
    <ArchivoForm :form="form" @onListar="listarArchivos" :currentPage="archivos.current_page"></ArchivoForm>
</template>