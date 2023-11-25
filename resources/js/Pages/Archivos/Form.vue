<script setup>
import { toRefs, onMounted, ref } from 'vue';
import useArchivo from '@/Composables/archivos.js';
import useHelper from '@/Helpers';  
const { hideModal, Toast, slugify } = useHelper();
const props = defineProps({
    form: Object,
    currentPage : Number
});
const { form, currentPage } = toRefs(props)
const {
    errors, respuesta, agregarArchivo, actualizarArchivo, listaArchivos
} = useArchivo();
const  emit  =defineEmits(['onListar'])
const crud = {
    'nuevo': async() => {
        let formData = new FormData();
        formData.append('id', form.value.id);
        formData.append('archivo', file.value);
        formData.append('titulo', form.value.titulo ?? '');
        formData.append('descripcion', form.value.descripcion ?? '');
        await agregarArchivo(formData)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            hideModal('#modalarchivo')
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', currentPage.value)

            
        }
    },
    'editar': async() => {
        await actualizarArchivo(form.value)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            hideModal('#modalarchivo')
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', currentPage.value)
        }
    }
}
const file = ref(null);
const cambiarArchivo = (e)=>{
    file.value = e.target.files[0]
}
const guardar = () => {
    crud[form.value.estadoCrud]()
}
onMounted(() => {
    listaArchivos()
})
</script>
<template>
    <form @submit.prevent="guardar">
    <div class="modal fade" id="modalarchivo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalarchivoLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalarchivoLabel">Modal title</h1>
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
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea  class="form-control" v-model="form.descripcion" :class="{ 'is-invalid': form.errors.descripcion }" placeholder="Descripcion"></textarea>
                        <small class="text-danger" v-for="error in form.errors.descripcion" :key="error">{{ error
                                }}</small>
                    </div>
                    <div class="mb-3">
                        <label for="archivo" class="form-label">Seleccione Archivo</label>
                        <input class="form-control" type="file" :class="{ 'is-invalid': form.errors.archivo }" @change="cambiarArchivo">
                        <small class="text-danger" v-for="error in form.errors.archivo" :key="error">{{ error }}<br></small>
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