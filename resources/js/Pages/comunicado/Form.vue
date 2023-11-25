<script setup>
import { toRefs, onMounted, ref } from 'vue';
import useComunicado from '@/Composables/comunicado.js';
import useHelper from '@/Helpers';  
const { hideModal, Toast, slugify } = useHelper();
const props = defineProps({
    form: Object,
    currentPage : Number
});
const { form, currentPage } = toRefs(props)
const {
    errors, respuesta, agregarComunicado, actualizarComunicado
} = useComunicado();
const  emit  =defineEmits(['onListar'])
const crud = {
    'nuevo': async() => {
        let formData = new FormData();
        formData.append('imagen', file.value);
        formData.append('titulo', form.value.titulo);
        formData.append('link', form.value.link);
        await agregarComunicado(formData)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            hideModal('#modalcomunicado')
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', currentPage.value)           
        }
    },
    'editar': async() => {
        let formData = new FormData();
        formData.append('id', form.value.id);
        formData.append('imagen', file.value);
        formData.append('titulo', form.value.titulo);
        formData.append('link', form.value.link);
        await actualizarComunicado(formData)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            hideModal('#modalcomunicado')
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', currentPage.value)
        }
    }
}
const guardar = () => {
    crud[form.value.estadoCrud]()
}
const file = ref(null);
const cambiarImagen = (e)=>{
    file.value = e.target.files[0]
    if (file) {
        form.value.nombreImagen=URL.createObjectURL(file.value);
    }
}
</script>
<template>
    <form @submit.prevent="guardar">
    <div class="modal fade" id="modalcomunicado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalcomunicadoLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalcomunicadoLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" v-model="form.titulo" :class="{ 'is-invalid': form.errors.titulo }" placeholder="Titulo">
                        <small class="text-danger" v-for="error in form.errors.titulo" :key="error">{{ error
                                }}</small>
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" class="form-control" v-model="form.link" :class="{ 'is-invalid': form.errors.link }" placeholder="URL">
                        <small class="text-danger" v-for="error in form.errors.link" :key="error">{{ error
                                }}</small>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" type="file" accept="image/*" @change="cambiarImagen">
                        <div class="card">
                            <img id="inputImagen" :src="form.nombreImagen" class="img-fluid img-thumbnail">
                        </div>
                        <small class="text-danger" v-for="error in form.errors.imagen" :key="error">{{ error }}<br></small>
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