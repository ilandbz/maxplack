import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'
export default function useEnlace() {
    const enlaces = ref([])
    const errors = ref('')
    const enlace = ref({})
    const respuesta = ref([])
    const carpetaEnlace = '/storage/enlacesexternos/';
    const obtenerEnlace = async(id) => {
        let respuesta = await axios.get('/enlace/mostrar?id='+id,getConfigHeader())
        enlace.value = respuesta.data
    }
    const listaEnlaces = async()=>{
        let respuesta = await axios.get('/enlace/todos',getConfigHeader())
        enlaces.value = respuesta.data        
    }
    const obtenerEnlaces = async(data) => {
        let respuesta = await axios.get('/enlace/listar' + getdataParamsPagination(data),getConfigHeader())
        enlaces.value =respuesta.data
    }
    const agregarEnlace = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/enlace/guardar',data,getConfigHeader())
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
    const actualizarEnlace = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/enlace/actualizar',data,getConfigHeader())
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
    const eliminarEnlace = async(id) => {
        const respond = await axios.post('/enlace/eliminar', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }
    return {
        errors, enlaces, listaEnlaces, enlace, obtenerEnlace, obtenerEnlaces, 
        agregarEnlace, actualizarEnlace, eliminarEnlace, respuesta, carpetaEnlace
    }
}