<script setup>
import { toRefs, onMounted, ref } from 'vue';
import useDirectorio from '@/Composables/directorio.js';
import useCargo from '@/Composables/cargos.js';
import useArea from '@/Composables/areas.js';
import useHelper from '@/Helpers';  
const { hideModal, Toast} = useHelper();
const props = defineProps({
    form: Object,
    currentPage : Number
});
const { form, currentPage } = toRefs(props)
const {
    errors, respuesta, agregarDirectorio, actualizarDirectorio
} = useDirectorio();
const {
    listaCargos, cargos
} = useCargo();
const {
    listaAreas, areas
} = useArea();
const  emit  =defineEmits(['onListar'])
const crud = {
    'nuevo': async() => {
        let formData = new FormData();
        formData.append('titulo', form.value.titulo);
        formData.append('dni', form.value.dni);
        formData.append('area_id', form.value.area_id);
        formData.append('cargo_id', form.value.cargo_id);
        formData.append('email', form.value.email ?? ''); 
        formData.append('celular', form.value.celular ?? ''); 
        formData.append('foto', file.value);
        formData.append('link', form.value.link ?? ''); 
        await agregarDirectorio(formData)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            hideModal('#modaldirectorio')
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', currentPage.value)

            
        }
    },
    'editar': async() => {
        let formData = new FormData();
        formData.append('id', form.value.id);
        formData.append('titulo', form.value.titulo);
        formData.append('dni', form.value.dni);
        formData.append('area_id', form.value.area_id);
        formData.append('cargo_id', form.value.cargo_id);
        formData.append('email', form.value.email ?? ''); 
        formData.append('celular', form.value.celular ?? ''); 
        formData.append('foto', file.value);
        formData.append('link', form.value.link ?? ''); 
        await actualizarDirectorio(formData)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            hideModal('#modaldirectorio')
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', currentPage.value)
        }
    }
}
const file = ref(null);
const cambiarFoto = (e)=>{
    file.value = e.target.files[0]
    if (file) {
        form.value.foto=URL.createObjectURL(file.value);
    }
}
const guardar = () => {
    crud[form.value.estadoCrud]()
}
onMounted(() => {
    listaCargos()
    listaAreas()
})
</script>
<template>
    <form @submit.prevent="guardar">
    <div class="modal fade" id="modaldirectorio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modaldirectorioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modaldirectorioLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input type="text" class="form-control" v-model="form.titulo" :class="{ 'is-invalid': form.errors.titulo }" placeholder="Titulo">
                                <small class="text-danger" v-for="error in form.errors.titulo" :key="error">{{ error
                                        }}</small>
                            </div>
                            <div class="mb-3">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" class="form-control" v-model="form.dni" :class="{ 'is-invalid': form.errors.dni }" placeholder="DNI">
                                <small class="text-danger" v-for="error in form.errors.dni" :key="error">{{ error
                                        }}</small>
                            </div>
                            <div class="mb-3">
                                <label for="area_id" class="form-label">Area</label>
                                <select class="form-control" v-model="form.area_id" :class="{ 'is-invalid': form.errors.area_id }">
                                    <option value="" disabled>--Seleccione--</option>
                                    <option v-for="(area, index) in areas" :key="index" :value="area.id">
                                        {{area.nombre}}
                                    </option>
                                </select>
                                <small class="text-danger" v-for="error in form.errors.area_id" :key="error">{{ error
                                        }}</small>
                            </div>                    
                            <div class="mb-3">
                                <label for="cargo_id" class="form-label">Cargo</label>
                                <select class="form-control" v-model="form.cargo_id" :class="{ 'is-invalid': form.errors.cargo_id }">
                                    <option value="" disabled>--Seleccione--</option>
                                    <option v-for="(cargo, index) in cargos" :key="index" :value="cargo.id">
                                        {{cargo.nombre}}
                                    </option>
                                </select>
                                <small class="text-danger" v-for="error in form.errors.cargo_id" :key="error">{{ error
                                        }}</small>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" v-model="form.email" :class="{ 'is-invalid': form.errors.email }" placeholder="Email">
                                <small class="text-danger" v-for="error in form.errors.email" :key="error">{{ error
                                        }}</small>
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" class="form-control" v-model="form.link" :class="{ 'is-invalid': form.errors.link }" placeholder="Link">
                                <small class="text-danger" v-for="error in form.errors.link" :key="error">{{ error
                                        }}</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="celular" class="form-label">Celular</label>
                                <input type="text" class="form-control" v-model="form.celular" :class="{ 'is-invalid': form.errors.celular }" placeholder="Celular">
                                <small class="text-danger" v-for="error in form.errors.celular" :key="error">{{ error
                                        }}</small>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input class="form-control" type="file" accept="image/*" @change="cambiarFoto">
                                <div class="card">
                                    <img id="inputImagen" :src="form.foto" class="img-fluid img-thumbnail">
                                </div>
                                <small class="text-danger" v-for="error in form.errors.foto" :key="error">{{ error }}<br></small>
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