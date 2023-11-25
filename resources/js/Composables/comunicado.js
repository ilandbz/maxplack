import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'
export default function useComunicado() {
    const comunicados = ref([])
    const errors = ref('')
    const comunicado = ref({})
    const respuesta = ref([])
    const carpetaComunicado =  '/storage/comunicado/';
    const obtenerComunicado = async(id) => {
        let respuesta = await axios.get('/comunicado/mostrar?id='+id,getConfigHeader())
        comunicado.value = respuesta.data
    }
    const listaComunicados = async()=>{
        let respuesta = await axios.get('/comunicado/todos',getConfigHeader())
        comunicados.value = respuesta.data        
    }
    const obtenerComunicados = async(data) => {
        let respuesta = await axios.get('/comunicado/listar' + getdataParamsPagination(data),getConfigHeader())
        comunicados.value =respuesta.data
    }
    const agregarComunicado = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/comunicado/guardar',data,getConfigHeader())
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
    const actualizarComunicado = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/comunicado/actualizar',data,getConfigHeader())
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
    const eliminarComunicado = async(id) => {
        const respond = await axios.post('/comunicado/eliminar', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }
    return {
        errors, comunicados, listaComunicados, comunicado, obtenerComunicado, obtenerComunicados, 
        agregarComunicado, actualizarComunicado, eliminarComunicado, respuesta, carpetaComunicado
    }
}