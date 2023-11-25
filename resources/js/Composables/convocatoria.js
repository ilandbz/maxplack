import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'
export default function useConvocatoria() {
    const convocatorias = ref([])
    const tipoconvocatorias = ref([])
    const archivos = ref([])
    const etapaconvocatorias = ref([])
    const errors = ref('')
    const convocatoria = ref({})
    const archivo = ref({})
    const respuesta = ref([])
    
    const obtenerConvocatoria = async(id) => {
        let respuesta = await axios.get('/convocatoria/mostrar?id='+id,getConfigHeader())
        convocatoria.value = respuesta.data
    }
    const listaConvocatorias = async()=>{
        let respuesta = await axios.get('/convocatoria/todos',getConfigHeader())
        convocatorias.value = respuesta.data        
    }
    const obtenerConvocatorias = async(data) => {
        let respuesta = await axios.get('/convocatoria/listar' + getdataParamsPagination(data),getConfigHeader())
        convocatorias.value =respuesta.data
    }
    const agregarConvocatoria = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/convocatoria/guardar',data,getConfigHeader())
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
    const agregarArchivo = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/convocatoria/guardar-archivo',data,getConfigHeader())
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
    const obtenerArchivo = async(id) => {
        let respuesta = await axios.get('/convocatoria/mostrar-archivo?id='+id,getConfigHeader())
        archivo.value = respuesta.data
    }
    const actualizarArchivo = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/convocatoria/actualizar-archivo',data,getConfigHeader())
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
    const listaArchivos = async(id)=>{
        let respuesta = await axios.get('/convocatoria/lista-archivos?id='+id,getConfigHeader())
        archivos.value = respuesta.data        
    }    
    const actualizarConvocatoria = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/convocatoria/actualizar',data,getConfigHeader())
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
    const eliminarConvocatoria = async(id) => {
        const respond = await axios.post('/convocatoria/eliminar', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }
    const eliminarArchivo = async(id) => {
        const respond = await axios.post('/convocatoria/eliminar-archivo', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }    
    const listaTipoConvocatorias = async()=>{
        let respuesta = await axios.get('/convocatoria/listar-tipo-convocatorias',getConfigHeader())
        tipoconvocatorias.value = respuesta.data        
    }
    const listaEtapaConvocatorias = async()=>{
        let respuesta = await axios.get('/convocatoria/listar-etapa-convocatorias',getConfigHeader())
        etapaconvocatorias.value = respuesta.data        
    }
     
    return {
        errors, convocatorias, listaConvocatorias, convocatoria, obtenerConvocatoria, obtenerConvocatorias, 
        agregarConvocatoria, actualizarConvocatoria, eliminarConvocatoria, respuesta, tipoconvocatorias, listaTipoConvocatorias,
        etapaconvocatorias, listaEtapaConvocatorias, agregarArchivo, listaArchivos, archivos, eliminarArchivo,
        actualizarArchivo, obtenerArchivo, archivo
    }
}