<script setup>
  import jwt_decode from 'jwt-decode'
  import { ref, onMounted } from 'vue';
  import { defineTitle } from '@/Helpers';
  import useHelper from '@/Helpers';  
  import useOrganizacion from '@/Composables/dato-general.js';
  import ContentHeader from '@/Components/ContentHeader.vue';
  const { openModal, Toast, Swal } = useHelper();
  const {
        organizacion, obtenerOrganizacion, actualizarOrganizacion, respuesta, errors       
    } = useOrganizacion();
    const titleHeader = ref({
      titulo: "Organizacion",
      subTitulo: "",
      icon: "",
      vista: ""
    });

    const form = ref({
        id: '',
        ruc: '',
        razon_social: '',
        titulo: '',
        slogan: '',
        descripcion: '',
        director: '',
        direccion: '',
        email: '',
        telefono: '',
        telefono2: '',
        url_web: '',
        quienes_somos: '',
        vision: '',
        mision: '',
        logo: '/storage/imagenes/logo.png',
        icono: '/storage/imagenes/favicon.ico',
        estadoCrud: '',
        errors: [],
    });
    const limpiar = () => {
        form.value.id = '';
        form.value.ruc = '';
        form.value.razon_social = '';
        form.value.titulo = '';
        form.value.slogan = '';
        form.value.descripcion = '';
        form.value.director = '';
        form.value.direccion = '';
        form.value.email = '';
        form.value.telefono = '';
        form.value.telefono2 = '';
        form.value.url_web = '';
        form.value.quienes_somos = '';
        form.value.vision = '';
        form.value.mision = '';
        form.value.logo ='/storage/imagenes/logo.png';
        form.value.icono ='/storage/imagenes/favicon.ico';
        form.value.estadoCrud = '';
        form.value.errors = [];
        errors.value = [];
    };
    const obtenerDatos = async(id) => {
        await obtenerOrganizacion(id);
        form.value.id = organizacion.value.id;
        form.value.ruc = organizacion.value.ruc;
        form.value.razon_social = organizacion.value.razon_social;
        form.value.titulo = organizacion.value.titulo;
        form.value.slogan = organizacion.value.slogan;
        form.value.descripcion = organizacion.value.descripcion;
        form.value.director = organizacion.value.director;
        form.value.direccion = organizacion.value.direccion;
        form.value.email = organizacion.value.email;
        form.value.telefono = organizacion.value.telefono;
        form.value.telefono2 = organizacion.value.telefono2;
        form.value.url_web = organizacion.value.url_web;
        form.value.quienes_somos = organizacion.value.quienes_somos;
        form.value.vision = organizacion.value.vision;
        form.value.mision = organizacion.value.mision;
        form.value.logo = '/storage/imagenes/'+organizacion.value.logo;
        form.value.icono = '/storage/imagenes/'+organizacion.value.icono;
    }

    const Guardar = async() => {
        let formData = new FormData();
        formData.append('id', form.value.id ?? '');
        formData.append('ruc', form.value.ruc ?? '');
        formData.append('razon_social', form.value.razon_social ?? '');
        formData.append('titulo', form.value.titulo ?? '');
        formData.append('slogan', form.value.slogan ?? '');
        formData.append('descripcion', form.value.descripcion ?? '');
        formData.append('director', form.value.director ?? '');
        formData.append('direccion', form.value.direccion ?? '');
        formData.append('email', form.value.email ?? '');
        formData.append('telefono', form.value.telefono ?? '');
        formData.append('telefono2', form.value.telefono2 ?? '');
        formData.append('url_web', form.value.url_web ?? '');
        formData.append('quienes_somos', form.value.quienes_somos ?? '');
        formData.append('vision', form.value.vision ?? '');
        formData.append('mision', form.value.mision ?? '');
        formData.append('logo', logo.value ?? '');
        formData.append('icono', icono.value ?? '');
        await actualizarOrganizacion(formData)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
        }
    }
    const logo = ref(null);
    const icono = ref(null);
    const cambiarLogo = (e)=>{
        logo.value = e.target.files[0]
        if (logo) {
            form.value.logo=URL.createObjectURL(logo.value);
        }
    }
    const cambiarIcono = (e)=>{
        icono.value = e.target.files[0]
        if (icono) {
            form.value.icono=URL.createObjectURL(icono.value);
        }
    }    
    onMounted(() => {
        defineTitle(titleHeader.value.titulo)
        obtenerDatos(1)
    })
</script>
<template>
    <ContentHeader :title-header="titleHeader"></ContentHeader>
    <div class="app-content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h6 class="card-title">
                    DATOS GENERALES
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="mb-3">
                            <label class="form-label" for="ruc">RUC</label>
                            <input class="form-control" type="text" placeholder="Name" v-model="form.ruc" :class="{ 'is-invalid': form.errors.ruc }" />
                            <small class="text-danger" v-for="error in form.errors.ruc" :key="error">{{ error }}</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="razon_social">Razon Social</label>
                            <input class="form-control" v-model="form.razon_social" type="text" placeholder="Razon Social" :class="{ 'is-invalid': form.errors.razon_social }" />
                            <small class="text-danger" v-for="error in form.errors.razon_social" :key="error">{{ error }}</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="titulo">Titulo</label>
                            <input class="form-control" v-model="form.titulo" type="text" placeholder="Paterno" :class="{ 'is-invalid': form.errors.titulo }" />
                            <small class="text-danger" v-for="error in form.errors.titulo" :key="error">{{ error }}</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="slogan">Slogan</label>
                            <input class="form-control" v-model="form.slogan" type="text" placeholder="Slogan" :class="{ 'is-invalid': form.errors.slogan }" />
                            <small class="text-danger" v-for="error in form.errors.slogan" :key="error">{{ error }}</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="descripcion">Descripcion</label>
                            <input class="form-control" v-model="form.descripcion" type="text" placeholder="Materno" :class="{ 'is-invalid': form.errors.descripcion }" />
                            <small class="text-danger" v-for="error in form.errors.descripcion" :key="error">{{ error }}</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="director">Director</label>
                            <input type="text" class="form-control" v-model="form.director" :class="{ 'is-invalid': form.errors.director }" placeholder="Director" />
                            <small class="text-danger" v-for="error in form.errors.director" :key="error">{{ error }}</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="direccion">Direccion</label>
                            <textarea class="form-control" v-model="form.direccion" :class="{ 'is-invalid': form.errors.direccion }" placeholder="Direccion"></textarea>
                            <small class="text-danger" v-for="error in form.errors.direccion" :key="error">{{ error }}</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="telefono">Teléfono</label>
                                    <input class="form-control" v-model="form.telefono" type="tel" placeholder="Teléfono" :class="{ 'is-invalid': form.errors.telefono }" />
                                    <small class="text-danger" v-for="error in form.errors.telefono" :key="error">{{ error }}</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input class="form-control" v-model="form.email" type="tel" placeholder="Email" :class="{ 'is-invalid': form.errors.email }" />
                                    <small class="text-danger" v-for="error in form.errors.email" :key="error">{{ error }}</small>
                                </div>                                
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="telefono2">Telefono 2</label>
                                    <input class="form-control" v-model="form.telefono2" type="tel" placeholder="Telefono" :class="{ 'is-invalid': form.errors.telefono2 }" />
                                    <small class="text-danger" v-for="error in form.errors.telefono2" :key="error">{{ error }}</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Logo</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="file" accept="image/*" @change="cambiarLogo" :class="{ 'is-invalid': form.errors.logo }">
                                    </div>   
                                    <small class="text-danger" v-for="error in form.errors.logo" :key="error">{{ error }}<br></small><br>
                                    <img id="inputImagen" :src="form.logo" class="img-fluid img-thumbnail" style="height: 60px;">                  
                                </div>
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label" for="url">URL</label>
                                    <input class="form-control" v-model="form.url_web" type="text" placeholder="URL" :class="{ 'is-invalid': form.errors.url_web }" />
                                    <small class="text-danger" v-for="error in form.errors.url_web" :key="error">{{ error }}</small>
                                </div>                            
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Icono</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="file" accept="image/*" @change="cambiarIcono" :class="{ 'is-invalid': form.errors.icono }">
                                    </div>   
                                    <small class="text-danger" v-for="error in form.errors.icono" :key="error">{{ error }}<br></small><br>
                                    <img id="inputImagen" :src="form.icono" class="img-fluid img-thumbnail" style="height: 60px;">                      
                                </div>
                            </div>                            
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="quienes_somos">Quienes Somos</label>
                            <textarea class="form-control" v-model="form.quienes_somos" :class="{ 'is-invalid': form.errors.quienes_somos }" rows="4"></textarea>
                            <small class="text-danger" v-for="error in form.errors.quienes_somos" :key="error">{{ error }}</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="mision">Mision</label>
                            <textarea class="form-control" v-model="form.mision" :class="{ 'is-invalid': form.errors.mision }" rows="3"></textarea>
                            <small class="text-danger" v-for="error in form.errors.mision" :key="error">{{ error }}</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tienehijos">Vision</label>
                            <textarea class="form-control" v-model="form.vision" :class="{ 'is-invalid': form.errors.vision }" rows="3"></textarea>
                            <small class="text-danger" v-for="error in form.errors.vision" :key="error">{{ error }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" @click.prevent="Guardar()">Guardar</button>
            </div>
        </div>
      </div>
    </div>
</template>