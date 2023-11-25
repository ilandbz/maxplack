import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'
export default function useGaleria() {
    const galerias = ref([])
    const imagenes = ref([])
    const errors = ref('')
    const galeria = ref({})
    const respuesta = ref([])
    const carpetaGaleria = '/storage/galeria/';
    const obtenerGaleria = async(id) => {
        let respuesta = await axios.get('/galeria/mostrar?id='+id,getConfigHeader())
        galeria.value = respuesta.data
    }
    const listaGalerias = async()=>{
        let respuesta = await axios.get('/galeria/todos',getConfigHeader())
        galerias.value = respuesta.data        
    }
    const obtenerGalerias = async(data) => {
        let respuesta = await axios.get('/galeria/listar' + getdataParamsPagination(data),getConfigHeader())
        galerias.value =respuesta.data
    }
    const agregarGaleria = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/galeria/guardar',data,getConfigHeader())
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
    const actualizargaleria = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/galeria/actualizar',data,getConfigHeader())
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
    const eliminarGaleria = async(id) => {
        const respond = await axios.post('/galeria/eliminar', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }
    const obtenerImagenes = async(id) =>{
        let respuesta = await axios.get('/galeria/mostrar-imagenes?id=' + id,getConfigHeader())
        imagenes.value =respuesta.data        
    }
    const subirImagen = async(data) =>{
        errors.value = ''
        try {
            let response = await axios.post('/galeria/subir-imagen',data,{
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
    const eliminarImagen = async(id) => {
        const respond = await axios.post('/galeria/eliminar-imagen', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }   
    return {
        errors, galerias, listaGalerias, galeria, obtenerGaleria, obtenerGalerias, 
        agregarGaleria, actualizargaleria, eliminarGaleria, respuesta, carpetaGaleria,
        obtenerImagenes, subirImagen, eliminarImagen, imagenes
    }
}