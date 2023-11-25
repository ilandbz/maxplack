import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'
export default function useEntrada() {
    const entradas = ref([])
    const errors = ref('')
    const entrada = ref({})
    const respuesta = ref([])
    
    const obtenerEntrada = async(id) => {
        let respuesta = await axios.get('/entrada/mostrar?id='+id,getConfigHeader())
        entrada.value = respuesta.data
    }
    const listaEntradas = async()=>{
        let respuesta = await axios.get('/entrada/todos',getConfigHeader())
        entradas.value = respuesta.data        
    }
    const obtenerEntradas = async(data) => {
        let respuesta = await axios.get('/entrada/listar' + getdataParamsPagination(data),getConfigHeader())
        entradas.value =respuesta.data
    }
    const agregarEntrada = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/entrada/guardar',data,getConfigHeader())
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
    const actualizarEntrada = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/entrada/actualizar',data,getConfigHeader())
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
    const eliminarEntrada = async(id) => {
        const respond = await axios.post('/entrada/eliminar', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }
    return {
        errors, entradas, listaEntradas, entrada, obtenerEntrada, obtenerEntradas, 
        agregarEntrada, actualizarEntrada, eliminarEntrada, respuesta
    }
}