import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'
export default function useArchivo() {
    const archivos = ref([])
    const errors = ref('')
    const archivo = ref({})
    const respuesta = ref([])
    const carpetaArchivos =  '/storage/archivos/';
    const obtenerArchivo = async(id) => {
        let respuesta = await axios.get('/archivo/mostrar?id='+id,getConfigHeader())
        archivo.value = respuesta.data
    }
    const listaArchivos = async()=>{
        let respuesta = await axios.get('/archivo/todos',getConfigHeader())
        archivos.value = respuesta.data        
    }
    const obtenerArchivos = async(data) => {
        let respuesta = await axios.get('/archivo/listar' + getdataParamsPagination(data),getConfigHeader())
        archivos.value =respuesta.data
    }
    const agregarArchivo = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/archivo/guardar',data,getConfigHeader())
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
    const actualizarArchivo = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/archivo/actualizar',data,getConfigHeader())
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
    const eliminarArchivo = async(id) => {
        const respond = await axios.post('/archivo/eliminar', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }
    return {
        errors, archivos, listaArchivos, archivo, obtenerArchivo, obtenerArchivos, 
        agregarArchivo, actualizarArchivo, eliminarArchivo, respuesta, carpetaArchivos
    }
}