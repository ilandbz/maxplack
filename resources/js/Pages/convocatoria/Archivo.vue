<script setup>
import { toRefs, onMounted } from 'vue';
import useConvocatoria from '@/Composables/convocatoria.js';
import useHelper from '@/Helpers';  
const { hideModal, Toast, slugify, Swal } = useHelper();
const props = defineProps({
    form: Object,
    archivos: Object
});
const  emit  =defineEmits(['onListar'])
const { form, archivos } = toRefs(props)
const {
    errors, respuesta, agregarArchivo, actualizarArchivo, obtenerArchivo,
    archivo, eliminarArchivo
} = useConvocatoria();
const crud = {
    'nuevo': async() => {
        await agregarArchivo(form.value)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', form.value.convocatoria_id)
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
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', form.value.convocatoria_id)
        }
    }
}
const guardar = () => {
    crud[form.value.estadoCrud]()
}
const editar =async(id)=>{
    await obtenerArchivo(id)
    form.value.id=archivo.value.id
    form.value.titulo=archivo.value.titulo
    form.value.link=archivo.value.link
    form.value.estadoCrud = 'editar'
}
const eliminar = (id) => {
    Swal.fire({
        title: '¿Estás seguro de Eliminar?',
        text: "Archivo Convocatoria",
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
    await eliminarArchivo(id)
    form.value.errors = []
    if(errors.value)
    {
        form.value.errors = errors.value
    }
    if(respuesta.value.ok==1){
        form.value.errors = []
        Toast.fire({icon:'success', title:respuesta.value.mensaje})
        emit('onListar', form.value.convocatoria_id)
    }
}
</script>
<template>
    <form @submit.prevent="guardar">
    <div class="modal fade" id="modalarchivos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalarchivosLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalarchivosLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <h6 class="card-title" v-if="form.estadoCrud=='nuevo'">
                                Nuevo Archivo
                            </h6>
                            <h6 class="card-title" v-else>
                                Actualizar Archivo
                            </h6>
                        </div>
                        <div class="card-body">
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
                            <div class="mt-2">
                                <button type="button" class="btn btn-primary" @click.prevent="guardar">{{ (form.estadoCrud=='nuevo') ? 'Guardar' : 'Actualizar' }}</button>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <table class="table table-bordered table-hover table-sm table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th colspan="7" class="text-center">Archivos</th>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>Titulo</th>
                                    <th>Link</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(archivo,index) in archivos" :key="archivo.id">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ archivo.titulo }}</td>
                                    <td><a target="_blank" :title="archivo.link" :href="archivo.link"><i class="fas fa-link"></i></a> </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" title="Editar" @click.prevent="editar(archivo.id)">
                                                <i class="fas fa-edit"></i>
                                        </button>&nbsp;
                                        <button class="btn btn-danger btn-sm" title="Eliminar" @click.prevent="eliminar(archivo.id)">
                                            <i class="fas fa-trash"></i>
                                        </button>&nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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