<script setup>
import { toRefs, onMounted, ref } from 'vue';
import useSlider from '@/Composables/slider.js';
import useHelper from '@/Helpers';  
const { hideModal, Toast, slugify } = useHelper();
const props = defineProps({
    form: Object,
    currentPage : Number
});
const { form, currentPage } = toRefs(props)
const {
    errors, respuesta, agregarSlider, actualizarSlider, listaSliders,
    carpetaSlider
} = useSlider();
const  emit  =defineEmits(['onListar'])

const file = ref(null);
const cambiarImagen = (e)=>{
    file.value = e.target.files[0]
    if (file.value) {
        form.value.imagen=URL.createObjectURL(file.value);
    }
}

const crud = {
    'nuevo': async() => {
        let formData = new FormData();
        formData.append('imagen', file.value);
        formData.append('titulo', form.value.titulo);
        formData.append('subtitulo', form.value.subtitulo);
        formData.append('nombrebutton1', form.value.nombrebutton1);
        formData.append('nombrebutton2', form.value.nombrebutton2);
        formData.append('link1', form.value.link1);
        formData.append('link2', form.value.link2);
        await agregarSlider(formData)
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            hideModal('#modalslider')
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', currentPage.value)
        }
    },
    'editar': async() => {
        let formData = new FormData();
        formData.append('id', form.value.id);
        formData.append('imagen', file.value);
        formData.append('titulo', form.value.titulo);
        formData.append('subtitulo', form.value.subtitulo ?? '');
        formData.append('nombrebutton1', form.value.nombrebutton1 ?? '');
        formData.append('nombrebutton2', form.value.nombrebutton2 ?? '');
        formData.append('link1', form.value.link1 ?? '');
        formData.append('link2', form.value.link2 ?? '');
        await actualizarSlider(formData)
        
        form.value.errors = []
        if(errors.value)
        {
            form.value.errors = errors.value
        }
        if(respuesta.value.ok==1){
            form.value.errors = []
            hideModal('#modalslider')
            Toast.fire({icon:'success', title:respuesta.value.mensaje})
            emit('onListar', currentPage.value)
        }
    }
}
const guardar = () => {
    crud[form.value.estadoCrud]()
}

onMounted(() => {
    listaSliders()
})
</script>
<template>
    <form @submit.prevent="guardar">
    <div class="modal fade" id="modalslider" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalsliderLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalsliderLabel">Modal title</h1>
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
                                <label for="subtitulo" class="form-label">Subtitulo</label>
                                <input type="text" class="form-control" v-model="form.subtitulo" :class="{ 'is-invalid': form.errors.subtitulo }" placeholder="Subtitulo">
                                <small class="text-danger" v-for="error in form.errors.subtitulo" :key="error">{{ error
                                        }}</small>
                            </div>
                            <div class="mb-3">
                                <label for="nombrebutton1" class="form-label">Button 1</label>
                                <input type="text" class="form-control" v-model="form.nombrebutton1" :class="{ 'is-invalid': form.errors.nombrebutton1 }" placeholder="Nombre del Boton">
                                <small class="text-danger" v-for="error in form.errors.nombrebutton1" :key="error">{{ error
                                        }}</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="nombrebutton2" class="form-label">Button 2</label>
                                <input type="text" class="form-control" v-model="form.nombrebutton2" :class="{ 'is-invalid': form.errors.nombrebutton2 }" placeholder="Nombre del Boton 2">
                                <small class="text-danger" v-for="error in form.errors.nombrebutton2" :key="error">{{ error
                                        }}</small>
                            </div>
                            <div class="mb-3">
                                <label for="link1" class="form-label">Link 1</label>
                                <input type="text" class="form-control" v-model="form.link1" :class="{ 'is-invalid': form.errors.link1 }" placeholder="Url">
                                <small class="text-danger" v-for="error in form.errors.link1" :key="error">{{ error
                                        }}</small>
                            </div>                    
                            <div class="mb-3">
                                <label for="link2" class="form-label">Link 2</label>
                                <input type="text" class="form-control" v-model="form.link2" :class="{ 'is-invalid': form.errors.link2 }" placeholder="Url">
                                <small class="text-danger" v-for="error in form.errors.link2" :key="error">{{ error
                                        }}</small>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen</label>
                                <input class="form-control" type="file" accept="image/*" @change="cambiarImagen">
                                <div class="card">
                                    <img id="inputImagen" :src="form.imagen" class="img-fluid img-thumbnail">
                                </div>
                                <small class="text-danger" v-for="error in form.errors.imagen" :key="error">{{ error }}<br></small>
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