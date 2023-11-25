import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'
export default function useDirectorio() {
    const directorios = ref([])
    const errors = ref('')
    const directorio = ref({})
    const respuesta = ref([])
    const carpetaFotos =  '/storage/fotos/';
    const obtenerDirectorio = async(id) => {
        let respuesta = await axios.get('/directorio/mostrar?id='+id,getConfigHeader())
        directorio.value = respuesta.data
    }
    const listaDirectorios = async()=>{
        let respuesta = await axios.get('/directorio/todos',getConfigHeader())
        directorios.value = respuesta.data        
    }
    const obtenerDirectorios = async(data) => {
        let respuesta = await axios.get('/directorio/listar' + getdataParamsPagination(data),getConfigHeader())
        directorios.value =respuesta.data
    }
    const agregarDirectorio = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/directorio/guardar',data,getConfigHeader())
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
    const actualizarDirectorio = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/directorio/actualizar',data,getConfigHeader())
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
    const eliminarDirectorio = async(id) => {
        const respond = await axios.post('/directorio/eliminar', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }
    return {
        errors, directorios, listaDirectorios, directorio, obtenerDirectorio, obtenerDirectorios, 
        agregarDirectorio, actualizarDirectorio, eliminarDirectorio, respuesta, carpetaFotos
    }
}