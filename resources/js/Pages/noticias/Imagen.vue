<script setup>
import { toRefs, ref,onMounted } from 'vue';
import useNoticia from '@/Composables/noticia.js';
import useHelper from '@/Helpers';  
const { hideModal, Toast, slugify } = useHelper();
const props = defineProps({
    form: Object,
    imagenes: Array
});
const { form, imagenes } = toRefs(props)
const {
    errors, respuesta, carpetaNoticias
} = useNoticia();
const file = ref(null);
const cambiarImagen = (e)=>{
    file.value = e.target.files[0]
    if (file) {
        form.value.nombreimagen=URL.createObjectURL(file.value);
    }
}
const subirImagen = async() => {
    let formData = new FormData();
    formData.append('imagen', file.value);
    formData.append('titulo', form.value.titulo);
    formData.append('subtitulo', form.value.subtitulo);
    formData.append('slug', form.value.slug);
    formData.append('contenido', form.value.contenido);
    await agregarNoticia(formData)
    form.value.errors = []
    if(errors.value)
        {
            form.value.errors = errors.value
        }
    if(respuesta.value.ok==1){
        // form.value.errors = []
        // hideModal('#modalnoticia')
        // Toast.fire({icon:'success', title:respuesta.value.mensaje})
        // emit('onListar', currentPage.value)
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
                                    <input class="form-control" type="file" accept="image/*" @change="cambiarImagen">
                                    <button type="button" class="btn btn-info">Subir</button>
                                </div>                                  
                            </div>
                          
                            <div class="mt-6">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <img id="inputImagen" :src="form.nombreimagen" class="img-fluid img-thumbnail">
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    
                                </div>
                                <small class="text-danger" v-for="error in form.errors.nombreimagen" :key="error">{{ error
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
                                    <td><div style="max-width: 120px;"><img class="img-fluid" :src="carpetaNoticias + imagen.nombreimagen"></div></td>
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
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</template>