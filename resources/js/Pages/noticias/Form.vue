<script setup>
import { toRefs, ref } from 'vue';
import useNoticia from '@/Composables/noticia.js';
import useHelper from '@/Helpers';  
const { hideModal, Toast, slugify } = useHelper();
const props = defineProps({
    form: Object,
    currentPage : Number
});
const { form, currentPage } = toRefs(props)
const {
    errors, respuesta, agregarNoticia, actualizarNoticia,
    actualizarNoticiaConImagen
} = useNoticia();
const  emit  =defineEmits(['onListar'])



const crud = {
    
    'nuevo': async() => {
        form.value.contenido= $('.note-editable').html();
        let formData = new FormData();
        formData.append('imagen', file.value);
        formData.append('titulo', form.value.titulo);
        formData.append('subtitulo', form.value.subtitulo);
        formData.append('slug', form.value.slug);
        formData.append('contenido', form.value.contenido);
        formData.append('fecha_publicacion', form.value.fecha_publicacion);
        await agregarNoticia(formData)
        form.value.errors = []
        if(errors.value)
            {
                form.value.errors = errors.value
            }
        if(respuesta.value.ok==1){
            form.value.errors = []
            hideModal('#modalnoticia')
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', currentPage.value)
        }
    },
    'editar': async() => {
        form.value.contenido= $('.note-editable').html();
        if(file.value === null){
            await actualizarNoticia(form.value)
        }else{
            let formData = new FormData();
            formData.append('id', form.value.id);
            formData.append('imagen', file.value);
            formData.append('titulo', form.value.titulo ?? '');
            formData.append('subtitulo', form.value.subtitulo ?? '');
            formData.append('slug', form.value.slug ?? '');
            formData.append('contenido', form.value.contenido ?? ''); 
            formData.append('fecha_publicacion', form.value.fecha_publicacion);
            await actualizarNoticiaConImagen(formData)
            form.value.errors = []
        }
        if(errors.value)
            {
                form.value.errors = errors.value
            }
        if(respuesta.value.ok==1){
            form.value.errors = []
            hideModal('#modalnoticia')
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', currentPage.value)
        } 
    }
}
const file = ref(null);
const cambiarImagen = (e)=>{
    file.value = e.target.files[0]
    if (file) {
        form.value.imagen=URL.createObjectURL(file.value);
    }
}
const guardar = () => {
    crud[form.value.estadoCrud]()
}
</script>
<template>
    <form @submit.prevent="guardar">
    <div class="modal fade" id="modalnoticia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalnoticiaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalnoticiaLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Titulo </label>
                                <input type="text" class="form-control" v-model="form.titulo" :class="{ 'is-invalid': form.errors.titulo }"
                                @keyup="form.slug=slugify(form.titulo)">
                                <small class="text-danger" v-for="error in form.errors.titulo" :key="error">{{ error
                                        }}</small>
                            </div>
                            <div class="mb-3">
                                <label for="subtitulo" class="form-label">Subtitulo </label>
                                <textarea v-model="form.subtitulo" class="form-control" :class="{ 'is-invalid': form.errors.subtitulo }" rows="3"></textarea>
                                <small class="text-danger" v-for="error in form.errors.subtitulo" :key="error">{{ error
                                        }}</small>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug </label>
                                <input type="text" readonly class="form-control" v-model="form.slug" :class="{ 'is-invalid': form.errors.slug }">
                                <small class="text-danger" v-for="error in form.errors.slug" :key="error">{{ error
                                        }}</small>
                            </div>  
                            <div class="mb-3">
                                <label for="fecha_publicacion" class="form-label">Fecha de Publicacion </label>
                                <input type="text" class="form-control" v-model="form.fecha_publicacion" :class="{ 'is-invalid': form.errors.fecha_publicacion }">
                                <small class="text-danger" v-for="error in form.errors.fecha_publicacion" :key="error">{{ error
                                        }}</small>                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen Preliminar</label>
                                <input class="form-control" type="file" accept="image/*" @change="cambiarImagen">
                                <div class="card">
                                    <img id="inputImagen" :src="form.imagen" class="img-fluid img-thumbnail">
                                </div>
                                <small class="text-danger" v-for="error in form.errors.imagen" :key="error">{{ error }}<br></small>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="contenido" class="form-label">Contenido </label>
                            <textarea id="summernote" v-model="form.contenido" class="form-control" :class="{ 'is-invalid': form.errors.contenido }" rows="10">
                            </textarea>
                            <small class="text-danger" v-for="error in form.errors.contenido" :key="error">{{ error }}</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{ (form.estadoCrud=='nuevo') ? 'Guardar' : 'Actualizar' }}</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</template>