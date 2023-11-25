import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'
export default function usePopup() {
    const popups = ref([])
    const imagenes = ref([])
    const errors = ref('')
    const popup = ref({})
    const respuesta = ref([])
    const carpetaPopup = '/storage/popup/';
    const obtenerPopup = async(id) => {
        let respuesta = await axios.get('/popup/mostrar?id='+id,getConfigHeader())
        popup.value = respuesta.data
    }
    const listaPopups = async()=>{
        let respuesta = await axios.get('/popup/todos',getConfigHeader())
        popups.value = respuesta.data        
    }
    const obtenerPopups = async(data) => {
        let respuesta = await axios.get('/popup/listar' + getdataParamsPagination(data),getConfigHeader())
        popups.value =respuesta.data
    }
    const agregarPopup = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/popup/guardar',data,getConfigHeader())
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
    const actualizarPopup = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/popup/actualizar',data,getConfigHeader())
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
    const eliminarPopup = async(id) => {
        const respond = await axios.post('/popup/eliminar', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }
    const obtenerImagenes = async(id) =>{
        let respuesta = await axios.get('/popup/mostrar-imagenes?id=' + id,getConfigHeader())
        imagenes.value =respuesta.data        
    }
    const subirImagen = async(data) =>{
        errors.value = ''
        try {
            let response = await axios.post('/popup/subir-imagen',data,{
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
        const respond = await axios.post('/popup/eliminar-imagen', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }   
    return {
        errors, popups, listaPopups, popup, obtenerPopup, obtenerPopups, 
        agregarPopup, actualizarPopup, eliminarPopup, respuesta,
        carpetaPopup, obtenerImagenes, subirImagen, eliminarImagen,
        imagenes
    }
}