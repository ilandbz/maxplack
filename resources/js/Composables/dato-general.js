import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'
export default function useOrganizacion() {
    const organizaciones = ref([])
    const errors = ref('')
    const organizacion = ref({})
    const respuesta = ref([])
    const obtenerOrganizacion = async(id) => {
        let respuesta = await axios.get('/organizacion/mostrar?id='+id,getConfigHeader())
        organizacion.value = respuesta.data
    }
    const listaOrganizacion = async()=>{
        let respuesta = await axios.get('/organizacion/todos',getConfigHeader())
        organizaciones.value = respuesta.data        
    }
    const obtenerOrganizaciones = async(data) => {
        let respuesta = await axios.get('/organizacion/listar' + getdataParamsPagination(data),getConfigHeader())
        organizaciones.value =respuesta.data
    }
    const agregarOrganizacion = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/organizacion/guardar',data,getConfigHeader())
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
    const actualizarOrganizacion = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/organizacion/actualizar',data,getConfigHeader())
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
    const eliminarOrganizacion = async(id) => {
        const respond = await axios.post('/organizacion/eliminar', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }
    return {
        errors, organizaciones, listaOrganizacion, organizacion, obtenerOrganizacion, obtenerOrganizaciones, 
        agregarOrganizacion, actualizarOrganizacion, eliminarOrganizacion, respuesta
    }
}