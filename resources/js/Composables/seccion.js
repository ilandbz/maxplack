import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'
export default function useSeccion() {
    const secciones = ref([])
    const errors = ref('')
    const seccion = ref({})
    const respuesta = ref([])
    
    const obtenerSeccion = async(id) => {
        let respuesta = await axios.get('/seccion/mostrar?id='+id,getConfigHeader())
        seccion.value = respuesta.data
    }
    const listaSecciones = async()=>{
        let respuesta = await axios.get('/seccion/todos',getConfigHeader())
        secciones.value = respuesta.data        
    }
    const obtenerSecciones = async(data) => {
        let respuesta = await axios.get('/seccion/listar' + getdataParamsPagination(data),getConfigHeader())
        secciones.value =respuesta.data
    }
    const agregarSeccion = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/seccion/guardar',data,getConfigHeader())
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
    const actualizarSeccion = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/seccion/actualizar',data,getConfigHeader())
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
    const eliminarSeccion = async(id) => {
        const respond = await axios.post('/seccion/eliminar', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }
    return {
        errors, secciones, listaSecciones, seccion, obtenerSeccion, obtenerSecciones, 
        agregarSeccion, actualizarSeccion, eliminarSeccion, respuesta
    }
}