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
    subirImagen, carpetaNoticias
} = useNoticia();
const  emit  =defineEmits(['onListar'])
const crud = {
    'nuevo': async() => {

        let formData = new FormData();
        formData.append('imagen', file.value);
        formData.append('noticia_id', 20);
        await subirImagen(formData)
        // if(errors.value)
        //     {
        //         form.value.errors = errors.value
        //     }
        // mostrarProgressBar.value = true;
        // if(prRespuesta.value.nombreimagen)
        // {
        //     //formimagen.value.imagen = prRespuesta.value.nombreimagen
        //     Toast.fire({icon:'success', title:prRespuesta.value.mensaje})
        //     emit('onListarImagenes', producto.value.id)
        //     inputimagen.src = carpetaProductos+formimagen.value.imagen;
        // }


        // await agregarNoticia(form.value)
        // form.value.errors = []
        // if(errors.value)
        // {
        //     form.value.errors = errors.value
        // }
        // if(respuesta.value.ok==1){
        //     form.value.errors = []
        //     hideModal('#modalnoticia')
        //     Toast.fire({icon:'success', title:respuesta.value.mensaje})
        //     emit('onListar', currentPage.value)
        // }
    },
    'editar': async() => {
        await actualizarNoticia(form.value)
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
    }
}
const file = ref(null);
const cambiarfoto = (e)=>{
    file.value = e.target.files[0]
    if (file) {
        inputimagen.src = URL.createObjectURL(file.value);
        //progress.value=0;
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
                                <input type="text" class="form-control" v-model="form.slug" :class="{ 'is-invalid': form.errors.slug }">
                                <small class="text-danger" v-for="error in form.errors.slug" :key="error">{{ error
                                        }}</small>
                            </div>  
                            <div class="mb-3">
                                <label for="contenido" class="form-label">Contenido </label>
                                <textarea v-model="form.contenido" class="form-control" :class="{ 'is-invalid': form.errors.contenido }" rows="6"></textarea>
                                <small class="text-danger" v-for="error in form.errors.contenido" :key="error">{{ error
                                        }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen Preliminar</label>
                                <input class="form-control" type="file" accept="image/*" @change="cambiarfoto">
                                <div class="card">
                                    <img id="inputimagen" :src="carpetaNoticias+form.imagen" class="img-fluid img-thumbnail">
                                </div>
                                <small class="text-danger" v-for="error in form.errors.imagen" :key="error">{{ error
                                        }}</small>
                            </div>  
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