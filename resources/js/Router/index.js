import { createRouter, createWebHistory } from "vue-router";
import jwt_decode from 'jwt-decode';

//PLANTILLAS
import LayoutLogin from '@/Layouts/AppLayoutLogin.vue'
import LayoutDefault from '@/Layouts/AppLayoutDefault.vue'
//vistas
import Principal from '@/Pages/Principal.vue'
import Login from '@/Pages/Auth/Login.vue'
import Noticia from '@/Pages/noticias/Inicio.vue'
import Profile from '@/Pages/Profile/Inicio.vue'
import Menu from '@/Pages/menus/Inicio.vue'
import Cargo from '@/Pages/cargos/Inicio.vue'
import Slider from '@/Pages/slider/Inicio.vue'
import Convocatoria from '@/Pages/convocatoria/Inicio.vue'
import Directorio from '@/Pages/directorio/Inicio.vue'
import Popup from '@/Pages/popup/Inicio.vue'
import Galeria from '@/Pages/galeria/Inicio.vue'
import Comunicado from '@/Pages/comunicado/Inicio.vue'
import Entrada from '@/Pages/entrada/Inicio.vue'
import Enlace from '@/Pages/enlaces/Inicio.vue'
import Redes from '@/Pages/redes/Inicio.vue'
import Archivo from '@/Pages/Archivos/Inicio.vue'
import General from '@/Pages/dato-general/Inicio.vue'
import Role from '@/Pages/roles/Inicio.vue'
import Usuario from '@/Pages/usuarios/Inicio.vue'
import MenuRole from '@/Pages/menu-roles/Inicio.vue'
import Area from '@/Pages/areas/Inicio.vue'
import Seccion from '@/Pages/secciones/Inicio.vue'
import TipoConvocatoria from '@/Pages/tipo-convocatoria/Inicio.vue'
const routes = [
    {
        path: '/intranet/principal', name:'Intranet', component: Principal ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/login',name: 'Login', component: Login,
        meta: {layout: LayoutLogin}
    },
    {
        path: '/intranet/noticia',name: 'Noticia', component: Noticia,
        meta: {layout: LayoutDefault}
    },
    {
        path: '/intranet/menus', name:'Menus', component: Menu ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/archivos', name:'Archivos', component: Archivo ,
        meta:{layout: LayoutDefault}
    },    
    {
        path: '/intranet/cargos', name:'Cargos', component: Cargo ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/slider', name:'Slider', component: Slider ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/convocatoria', name:'Convocatoria', component: Convocatoria ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/directorio', name:'Directorio', component: Directorio ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/popup', name:'Popups', component: Popup ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/galeria', name:'Galeria', component: Galeria ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/comunicado', name:'Comunicado', component: Comunicado ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/entrada', name:'Entrada', component: Entrada ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/enlaces', name:'Enlace', component: Enlace ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/dato-general', name:'General', component: General ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/menu-roles', name:'Menu Role', component: MenuRole ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/areas', name:'Area', component: Area ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/redes', name:'RedSocial', component: Redes ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/roles', name:'Role', component: Role ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/usuarios', name:'Usuario', component: Usuario ,
        meta:{layout: LayoutDefault}
    },    
    {
        path: '/intranet/tipo-convocatoria', name:'Tipo Convocatoria', component: TipoConvocatoria ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/perfil', name:'Perfil', component: Profile ,
        meta:{layout: LayoutDefault}
    },
    {
        path: '/intranet/secciones', name:'Secciones', component: Seccion ,
        meta:{layout: LayoutDefault}
    },
]

export default createRouter({
    history: createWebHistory(),
    routes
})