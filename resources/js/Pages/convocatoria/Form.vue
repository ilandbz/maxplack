<script setup>
import { toRefs, onMounted } from 'vue';
import useConvocatoria from '@/Composables/convocatoria.js';
import useHelper from '@/Helpers';  
const { hideModal, Toast, slugify } = useHelper();
const props = defineProps({
    form: Object,
    currentPage : Number
});
const { form, currentPage } = toRefs(props)
const {
    errors, respuesta, agregarConvocatoria, actualizarConvocatoria, listaConvocatorias,
    listaEtapaConvocatorias, listaTipoConvocatorias, tipoconvocatorias, etapaconvocatorias
} = useConvocatoria();
const  emit  =defineEmits(['onListar'])
const crud = {
    'nuevo': async() => {
        await agregarConvocatoria(form.value)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            hideModal('#modalconvocatoria')
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', currentPage.value)

            
        }
    },
    'editar': async() => {
        await actualizarConvocatoria(form.value)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            hideModal('#modalconvocatoria')
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', currentPage.value)
        }
    }
}
const guardar = () => {
    crud[form.value.estadoCrud]()
}
onMounted(() => {
    listaConvocatorias()
    listaEtapaConvocatorias() 
    listaTipoConvocatorias()
})
</script>
<template>
    <form @submit.prevent="guardar">
    <div class="modal fade" id="modalconvocatoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalconvocatoriaLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalconvocatoriaLabel">Modal title</h1>
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
                        <textarea class="form-control" v-model="form.descripcion" :class="{ 'is-invalid': form.errors.descripcion }" placeholder="Descripcion"></textarea>
                        <small class="text-danger" v-for="error in form.errors.descripcion" :key="error">{{ error
                                }}</small>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_convocatoria_id" class="form-label">Tipo de Convocatoria</label>
                        <select class="form-control" v-model="form.tipo_convocatoria_id" :class="{ 'is-invalid': form.errors.tipo_convocatoria_id }">
                            <option value="" disabled>--Seleccione--</option>
                            <option v-for="(item, index) in tipoconvocatorias" :key="index" :value="item.id">
                                {{item.nombre}}
                            </option>
                        </select>
                        <small class="text-danger" v-for="error in form.errors.tipo_convocatoria_id" :key="error">{{ error
                                }}</small>
                    </div>
                    <div class="mb-3">
                        <label for="etapa_convocatoria_id" class="form-label">Etapa de Convocatoria</label>
                        <select class="form-control" v-model="form.etapa_convocatoria_id" :class="{ 'is-invalid': form.errors.etapa_convocatoria_id }">
                            <option value="" disabled>--Seleccione--</option>
                            <option v-for="(item, index) in etapaconvocatorias" :key="index" :value="item.id">
                                {{item.nombre}}
                            </option>
                        </select>
                        <small class="text-danger" v-for="error in form.errors.etapa_convocatoria_id" :key="error">{{ error
                                }}</small>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado de Convocatoria</label>
                        <select class="form-control" v-model="form.estado" :class="{ 'is-invalid': form.errors.estado }">
                            <option value="Abierto">Abierto</option>
                            <option value="Cerrado">Cerrado</option>
                        </select>
                        <small class="text-danger" v-for="error in form.errors.estado" :key="error">{{ error
                                }}</small>
                    </div>                    
                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                        <input type="date" class="form-control" v-model="form.fecha_inicio" :class="{ 'is-invalid': form.errors.fecha_inicio }">
                        <small class="text-danger" v-for="error in form.errors.fecha_inicio" :key="error">{{ error
                                }}</small>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_fin" class="form-label">Fecha Fin</label>
                        <input type="date" class="form-control" v-model="form.fecha_fin" :class="{ 'is-invalid': form.errors.fecha_fin }">
                        <small class="text-danger" v-for="error in form.errors.fecha_fin" :key="error">{{ error
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