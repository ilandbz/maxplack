import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'
export default function useNav() {
    const navs = ref([])
    const errors = ref('')
    const nav = ref({})
    const respuesta = ref([])
    
    const obtenerNav = async(id) => {
        let respuesta = await axios.get('/nav/mostrar?id='+id,getConfigHeader())
        nav.value = respuesta.data
    }
    const listaNavs = async()=>{
        let respuesta = await axios.get('/nav/todos',getConfigHeader())
        navs.value = respuesta.data        
    }
    const obtenerNavs = async(data) => {
        let respuesta = await axios.get('/nav/listar' + getdataParamsPagination(data),getConfigHeader())
        navs.value =respuesta.data
    }
    const agregarNav = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/nav/guardar',data,getConfigHeader())
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
    const actualizarNav = async(data) => {
        errors.value = ''
        try {
            let respond = await axios.post('/nav/actualizar',data,getConfigHeader())
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
    const eliminarnav = async(id) => {
        const respond = await axios.post('/nav/eliminar', {id:id},getConfigHeader())
        if(respond.data.ok==1)
        {
            respuesta.value = respond.data
        }
    }
    return {
        errors, navs, listaNavs, nav, obtenerNav, obtenerNavs, 
        agregarNav, actualizarNav, eliminarnav, respuesta
    }
}