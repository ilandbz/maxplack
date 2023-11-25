<script setup>
import { toRefs, onMounted } from 'vue';
import useTipoConvocatoria from '@/Composables/tipo-convocatoria.js';
import useHelper from '@/Helpers';  
const { hideModal, Toast, slugify } = useHelper();
const props = defineProps({
    form: Object,
    currentPage : Number
});
const { form, currentPage } = toRefs(props)
const {
    errors, respuesta, agregarTipoConvocatoria, actualizartipoconvocatoria
} = useTipoConvocatoria();
const  emit  =defineEmits(['onListar'])
const crud = {
    'nuevo': async() => {
        await agregarTipoConvocatoria(form.value)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            hideModal('#modaltipoconvocatoria')
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', currentPage.value)
           
        }
    },
    'editar': async() => {
        await actualizartipoconvocatoria(form.value)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            hideModal('#modaltipoconvocatoria')
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', currentPage.value)
        }
    }
}
const guardar = () => {
    crud[form.value.estadoCrud]()
}

</script>
<template>
    <form @submit.prevent="guardar">
    <div class="modal fade" id="modaltipoconvocatoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modaltipoconvocatoriaLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modaltipoconvocatoriaLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" v-model="form.nombre" :class="{ 'is-invalid': form.errors.nombre }" placeholder="Nombre" @keyup="form.slug=slugify(form.nombre)">
                        <small class="text-danger" v-for="error in form.errors.nombre" :key="error">{{ error
                                }}</small>
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