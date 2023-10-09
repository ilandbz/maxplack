import { createRouter, createWebHistory } from "vue-router";
import jwt_decode from 'jwt-decode';

//PLANTILLAS
import LayoutLogin from '@/Layouts/AppLayoutLogin.vue'
import LayoutDefault from '@/Layouts/AppLayoutDefault.vue'
// import { useUsuarioStore } from "../Store/UsuarioStore";
// import { storeToRefs } from 'pinia';
//vistas
import Principal from '@/Pages/Principal.vue'
// import Usuario from '@/Pages/usuarios/Inicio.vue'
import Login from '@/Pages/Auth/Login.vue'

const routes = [
    {
        path: '/intranet/login',name: 'Login', component: Login,
        meta: {layout: LayoutLogin}
    },
    {
        path: '/intranet', name:'Intranet', component: Principal ,
        meta:{layout: LayoutDefault}
    },
]

export default createRouter({
    history: createWebHistory(),
    routes
})