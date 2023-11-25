import { defineStore } from "pinia";
import axios from "axios";
import jwt_decode from 'jwt-decode';

export const useUsuarioStore = defineStore("usuario", {

    state: () => ({
        usuario: {},
        menus:[],
        role:{},
    }),
    actions: {
        async cargarDatosSession(){
            const user_id = localStorage.getItem('userSession') ? 
                JSON.parse( JSON.stringify(jwt_decode(localStorage.getItem('userSession')).user)) 
                : null;

            try {
                this.usuario = await axios.get('/intranet/usuario-session-data/', {
                    params: { id: user_id }
                }).then(
                    (respuesta) => respuesta.data
                );
            } catch (error) {
                if (error.response && error.response.status === 401) {
                    console.error('Error 401: No autorizado. El usuario no está autenticado.');
                    localStorage.removeItem('userSession')
                    window.location.href="/intranet/login"
                } else {
                    console.error('Error en la solicitud:', error.message);
                }
            }
            if(this.usuario)
            {
                this.role = this.usuario.role
            }
            else
            {
                
                localStorage.removeItem('userSession')
                //window.location.href="/intranet/login"
            }
        },
        modificarFoto(foto) {
            this.usuario.foto = foto
        },
        cargarMenus() {
            if(this.usuario.menus)
            {
                this.menus = this.usuario.menus ?? []
            }
        },
        limpiarEstados() {
            this.usuario = {};
            this.menus = [this.menus];
            role:{};
        }
    }
})
