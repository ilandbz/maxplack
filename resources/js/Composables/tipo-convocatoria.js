import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'
export default function useTipoConvocatoria() {
    const tipoconvocatorias = ref([])
    const errors = ref('')
    const tipoconvocatoria = ref({})
    const respuesta = ref([])
    
    const obtenerTipoConvocatoria = async(id) => {
        let respuesta = await axios.get('/tipoconvocatoria/mostrar?id='+id,getConfigHeader())
        tipoconvocatoria.value = respuesta.data
    }
    const listaTipoConvocatorias = async()=>{
        let respuesta = await axios.get('/tipoconvocatoria/todos',getConfigHeader())
        tipoconvocatorias.value = respuesta.data        
    }
    const obtenerTipoConvocatorias = async(data) => {
        let respuesta = await axios.get('/tipoconvocatoria/listar' + getdataParamsPagination(data),getConfigHeader())
        tipoconvocatorias.value =respuesta.data
    }
    const agregarTipoConvocatoria = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/tipoconvocatoria/guardar',data,getConfigHeader())
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
    const actualizartipoconvocatoria = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/tipoconvocatoria/actualizar',data,getConfigHeader())
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
    const eliminarTipoConvocatoria = async(id) => {
        const respond = await axios.post('/tipoconvocatoria/eliminar', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }
    return {
        errors, tipoconvocatorias, listaTipoConvocatorias, tipoconvocatoria, obtenerTipoConvocatoria, obtenerTipoConvocatorias, 
        agregarTipoConvocatoria, actualizartipoconvocatoria, eliminarTipoConvocatoria, respuesta
    }
}