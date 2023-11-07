import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'
export default function useNoticia() {
    const noticias = ref([])
    const imagenes = ref([])
    const errors = ref('')
    const noticia = ref({})
    const respuesta = ref([])
    const carpetaNoticias =  '/storage/noticias/';
    const obtenerNoticia = async(id) => {
        let respuesta = await axios.get('/noticia/mostrar?id='+id,getConfigHeader())
        noticia.value = respuesta.data
    }
    const obtenerNoticias = async(data) => {
        let respuesta = await axios.get('/noticia/listar' + getdataParamsPagination(data),getConfigHeader())
        noticias.value =respuesta.data
    }
    const obtenerImagenes = async(id) =>{
        let respuesta = await axios.get('/noticia/mostrar-imagenes?id=' + id,getConfigHeader())
        imagenes.value =respuesta.data        
    }
    const subirImagen = async(data) =>{
        errors.value = ''
        try {
            let response = await axios.post('/noticia/subir-imagen',data,{
                headers: getConfigHeader(),
                onUploadProgress: (progressEvent) => {
                    //progress.value = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                }
            })
            errors.value =''
            respuesta.value=response.data
        } catch (error) {
            errors.value=""
            if(error.response.status === 422) {
                errors.value = error.response.data.errors
            }
        }
    }
    const agregarNoticia = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/noticia/guardar',data,getConfigHeader())
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
    const actualizarNoticia = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/noticia/actualizar',data,getConfigHeader())
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
    const actualizarNoticiaConImagen = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/noticia/actualizar-con-imagen',data,getConfigHeader())
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
    const eliminarNoticia = async(id) => {
        const respond = await axios.post('/noticia/eliminar', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }
    const eliminarImagen = async(id) => {
        const respond = await axios.post('/noticia/eliminar-imagen', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }    
    return {
        errors, noticias, noticia, obtenerNoticia, obtenerNoticias, 
        agregarNoticia, actualizarNoticia, eliminarNoticia, respuesta,
        subirImagen, carpetaNoticias, actualizarNoticiaConImagen,
        obtenerImagenes, imagenes, eliminarImagen
    }
}