import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'
export default function useSlider() {
    const sliders = ref([])
    const errors = ref('')
    const slider = ref({})
    const respuesta = ref([])
    const carpetaSlider =  '/storage/slider/';
    const obtenerSlider = async(id) => {
        let respuesta = await axios.get('/slider/mostrar?id='+id,getConfigHeader())
        slider.value = respuesta.data
    }
    const listaSliders = async()=>{
        let respuesta = await axios.get('/slider/todos',getConfigHeader())
        sliders.value = respuesta.data        
    }
    const obtenerSliders = async(data) => {
        let respuesta = await axios.get('/slider/listar' + getdataParamsPagination(data),getConfigHeader())
        sliders.value =respuesta.data
    }
    const agregarSlider = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/slider/guardar',data,getConfigHeader())
            errors.value =''
            if(respond.data.ok==1){
                respuesta.value=respond.data
            }
        } catch (error) {
            errors.value=""
            if(error.response.status === 422) {
                errors.value = error.response.data.errors
            }
        }
    }
    const actualizarSlider = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/slider/actualizar',data,getConfigHeader())
            errors.value =''
            if(respond.data.ok==1){
                respuesta.value=respond.data
            }

        } catch (error) {
            errors.value=""
            if(error.response.status === 422) {
                errors.value = error.response.data.errors
            }
        }
    }
    const eliminarSlider = async(id) => {
        const respond = await axios.post('/slider/eliminar', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }
    return {
        errors, sliders, listaSliders, slider, obtenerSlider, obtenerSliders, 
        agregarSlider, actualizarSlider, eliminarSlider, respuesta, carpetaSlider
    }
}