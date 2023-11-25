<script setup>
  import jwt_decode from 'jwt-decode'
  import { ref, onMounted } from 'vue';
  import { defineTitle } from '@/Helpers';
  import useHelper from '@/Helpers';  
  import useEntrada from '@/Composables/entrada.js';
  import ContentHeader from '@/Components/ContentHeader.vue';
  import EntradaForm from './Form.vue'
  const { openModal, Toast, Swal } = useHelper();
  const {
        entradas, errors, entrada, respuesta,
        obtenerEntradas, obtenerEntrada, eliminarEntrada
        
    } = useEntrada();
    const titleHeader = ref({
      titulo: "Entradas",
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
        ruta : '',
        slug : '',
        contenido: `
        <section class="notice-area mb-4">
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="section-title-2">
                    <h2 class="title">TITULO</h2>
                    <span class="line"></span>
                    <p>Find your desired questioner here If you are going use a passage of Lorem Ipsum need equal belongs to those who fail in their duty of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy</p>
                </div>
                </div>
            </div>
            <div class="notice-content">
                <div class="single-notice">
                <span class="number">01.</span>
                <h3 class="notice-title">There are so many schools in the U.S. How do I decide which schools to apply to</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ratione amet voluptatem dolores enim veniam ea quos ipsum eaque. Corrupti, iste voluptate tempore blanditiis beatae nostrum! Ex et, dolores dolore quisquam, delectus temporibus, sed accusamus doloremque quia nobis tempore ab quibusdam? Voluptatem totam est, rerum deserunt corporis fugiat asperiores consequuntur!</p>
                </div>
            </div>
            </div>
        </section>
        `,
        estadoCrud:'',
        errors:[]

    });
    const limpiar = ()=> {
        form.value.id='',
        form.value.titulo='',
        form.value.ruta='',
        form.value.slug='',
        form.value.contenido=`
        <section class="notice-area mb-4">
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="section-title-2">
                    <h2 class="title">TITULO</h2>
                    <span class="line"></span>
                    <p>Find your desired questioner here If you are going use a passage of Lorem Ipsum need equal belongs to those who fail in their duty of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy</p>
                </div>
                </div>
            </div>
            <div class="notice-content">
                <div class="single-notice">
                <span class="number">01.</span>
                <h3 class="notice-title">There are so many schools in the U.S. How do I decide which schools to apply to</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ratione amet voluptatem dolores enim veniam ea quos ipsum eaque. Corrupti, iste voluptate tempore blanditiis beatae nostrum! Ex et, dolores dolore quisquam, delectus temporibus, sed accusamus doloremque quia nobis tempore ab quibusdam? Voluptatem totam est, rerum deserunt corporis fugiat asperiores consequuntur!</p>
                </div>
            </div>
            </div>
        </section>`
        ,
        form.value.estadoCrud = '',          
        form.value.errors = []
        errors.value = []
    }
    const obtenerDatos = async(id) => {
        await obtenerEntrada(id);
        if(entrada.value)
        {
            form.value.id=entrada.value.id;
            form.value.titulo=entrada.value.titulo;
            form.value.ruta=entrada.value.ruta;
            form.value.slug=entrada.value.slug;
            form.value.contenido=entrada.value.contenido;
        }
    }
    const editar = async(id) => {
        limpiar();
        await obtenerDatos(id)
        form.value.estadoCrud = 'editar'
        $('#summernote').html(form.value.contenido);
        $('.note-editable').html(form.value.contenido);
        document.getElementById("modalentradaLabel").innerHTML = 'Editar Entrada';
        openModal('#modalentrada')
    }
    const nuevo = () => {
        limpiar()
        form.value.estadoCrud = 'nuevo'
        $('#summernote').html(form.value.contenido);
        $('.note-editable').html(form.value.contenido);
        openModal('#modalentrada')
        document.getElementById("modalentradaLabel").innerHTML = 'Nueva Entrada';
        //titulo.textContent = 'Editar Datos Personales';
    }
    const listarEntradas = async(page=1) => {
        dato.value.page= page
        await obtenerEntradas(dato.value)
    }
    const eliminar = (id) => {
        Swal.fire({
            title: '¿Estás seguro de Eliminar?',
            text: "Entrada",
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
        await eliminarEntrada(id)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            listarEntradas(entradas.value.current_page)
        }
    }
    // PAGINACION
    const isActived = () => {
        return entradas.value.current_page
    }
    const offset = 2;

    const buscar = () => {
        listarEntradas()
    }
    const cambiarPaginacion = () => {
        listarEntradas()
    }
    const cambiarPagina =(pagina) => {
        listarEntradas(pagina)
    }
    const pagesNumber = () => {
        if(!entradas.value.to){
            return []
        }
        let from = entradas.value.current_page - offset
        if(from < 1) from = 1
        let to = from + (offset*2)
        if( to >= entradas.value.last_page) to = entradas.value.last_page
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
        listarEntradas()
    })
</script>
<template>
    <ContentHeader :title-header="titleHeader"></ContentHeader>
    <div class="app-content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h6 class="card-title">
                    Listado de Entradas
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
                                <li v-if="entradas.current_page >= 2" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Primera Página"
                                        @click.prevent="cambiarPagina(1)">
                                        <span><i class="fas fa-backward-fast"></i></span>
                                    </a>
                                </li>
                                <li v-if="entradas.current_page > 1" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Página Anterior"
                                        @click.prevent="cambiarPagina(entradas.current_page - 1)">
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
                                <li v-if="entradas.current_page < entradas.last_page" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        title="Página Siguiente"
                                        @click.prevent="cambiarPagina(entradas.current_page + 1)">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </li>
                                    <li v-if="entradas.current_page <= entradas.last_page-1" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        @click.prevent="cambiarPagina(entradas.last_page)"
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
                                        <th colspan="7" class="text-center">Entradas</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Titulo</th>
                                        <th>Ruta</th>
                                        <th>Slug</th>
                                        <th>contenido</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="entradas.total == 0">
                                        <td class="text-danger text-center" colspan="7">
                                            -- Datos No Registrados - Tabla Vacía --
                                        </td>
                                    </tr>
                                    <tr v-else v-for="(entrada,index) in entradas.data" :key="entrada.id">
                                        <td>{{ index + entradas.from }}</td>
                                        <td>{{ entrada.titulo }}</td>
                                        <td>{{ entrada.ruta }}</td>
                                        <td>{{ entrada.slug }}</td>
                                        <td>{{ entrada.contenido }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" title="Editar" @click.prevent="editar(entrada.id)">
                                                <i class="fas fa-edit"></i>
                                            </button>&nbsp;
                                            <button class="btn btn-danger btn-sm" title="Enviar a Papelera" @click.prevent="eliminar(entrada.id, 'Temporal')">
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
                        Mostrando <b>{{entradas.from}}</b> a <b>{{ entradas.to }}</b> de <b>{{ entradas.total}}</b> Registros
                    </div>
                    <div class="col-md-7 mb-1 text-right">
                        <nav>
                            <ul class="pagination">
                                <li v-if="entradas.current_page >= 2" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Primera Página"
                                        @click.prevent="cambiarPagina(1)">

                                        <span><i class="fas fa-backward-fast"></i></span>
                                    </a>
                                </li>
                                <li v-if="entradas.current_page > 1" class="page-item">
                                    <a href="#" aria-label="Previous" class="page-link"
                                        title="Página Anterior"
                                        @click.prevent="cambiarPagina(entradas.current_page - 1)">

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
                                <li v-if="entradas.current_page < entradas.last_page" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        title="Página Siguiente"
                                        @click.prevent="cambiarPagina(entradas.current_page + 1)">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </li>
                                    <li v-if="entradas.current_page <= entradas.last_page-1" class="page-item">
                                    <a href="#" aria-label="Next" class="page-link"
                                        @click.prevent="cambiarPagina(entradas.last_page)"
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
    <EntradaForm :form="form" @onListar="listarEntradas" :currentPage="entradas.current_page"></EntradaForm>
</template>