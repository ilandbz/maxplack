<script setup>
    import { cargarClasesPrincipalLayout } from '@/Helpers';
    import { onMounted } from 'vue';
    import useDatosSession from '@/Composables/session';
    //import PreLoader from '@/Components/PreLoader.vue';
    import NavBar from '@/Components/NavBar.vue';
    import SideBar from '@/Components/SideBar.vue';
    import Footer from '@/Components/Footer.vue';

    const { usuario, menus } = useDatosSession();
    onMounted(() => {
        cargarClasesPrincipalLayout();
    })
</script>

<template>
    <div class="app-wrapper">

        <nav-bar :usuario="usuario"></nav-bar>
        <side-bar :usuario="usuario" :menus="menus"></side-bar>
        <main class="app-main">
            <router-view></router-view>
        </main>
        <Footer></Footer>

    </div>
</template>