<script setup>
import { toRefs, ref,onMounted } from 'vue';
import useGaleria from '@/Composables/galeria.js';
import useHelper from '@/Helpers';  
const { hideModal, Toast, slugify, Swal } = useHelper();
const props = defineProps({
    form: Object,
    imagenes: Array
});
const { form, imagenes } = toRefs(props)
const {
    errors, respuesta, carpetaGaleria, subirImagen,
    eliminarImagen
} = useGaleria();
const  emit  =defineEmits(['cargarImagenes'])
const file = ref(null);
const cambiarImagen = (e)=>{
    file.value = e.target.files[0]
    if (file) {
        form.value.nombreImagen=URL.createObjectURL(file.value);
    }
}
const guardarImagen = async() => {
    let formData = new FormData();
    formData.append('galeria_id', form.value.galeria_id);
    formData.append('imagen', file.value);
    await subirImagen(formData)
    form.value.errors = []
    if(errors.value)
    {
        form.value.errors = errors.value
    }
    if(respuesta.value.ok==1){
        form.value.errors = []
        Toast.fire({icon:'success', title:respuesta.value.mensaje})
        emit('cargarImagenes', form.value.galeria_id)
    }
}
const eliminar = (id) => {
        Swal.fire({
            title: '¿Estás seguro de Eliminar?',
            text: "Galeria",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminalo!'
        }).then((result) => {
            if (result.isConfirmed) {
                eliminarImg(id)
            }
        })
    }
const eliminarImg=async(id)=>{
    await eliminarImagen(id)
    if(respuesta.value.ok==1)
    {
        Toast.fire({icon:'success', title:respuesta.value.mensaje})
        emit('cargarImagenes', form.value.galeria_id)
    }
}
</script>
<template>
    <form @submit.prevent="guardar">
    <div class="modal fade" id="modalimagen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalimagenLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalimagenLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="">
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen Preliminar</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" type="file" accept="image/*" @change="cambiarImagen" :class="{ 'is-invalid': form.errors.nombreImagen }">
                                    <button type="button" class="btn btn-info" @click="guardarImagen">Subir</button>
                                </div>   
                                <small class="text-danger" v-for="error in form.errors.nombreImagen" :key="error">{{ error
                                        }}<br></small>                         
                            </div>
                          
                            <div class="mt-6">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <img id="inputImagen" :src="form.nombreImagen" class="img-fluid img-thumbnail">
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    
                                </div>
                                <small class="text-danger" v-for="error in form.errors.nombreImagen" :key="error">{{ error
                                        }}<br></small>
                            </div>
    
                        </form>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 mb-1">
                            <table class="table table-bordered table-hover table-sm table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th colspan="7" class="text-center">Imagenes</th>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(imagen,index) in imagenes" :key="imagen.id">
                                    <td>{{ index + 1 }}</td>
                                    <td><div style="max-width: 120px;"><img class="img-fluid" :src="carpetaGaleria + imagen.nombreimagen"></div></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" title="Eliminar" @click.prevent="eliminar(imagen.id)">
                                            <i class="fas fa-trash"></i>
                                        </button>&nbsp;
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</template>