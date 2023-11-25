<script setup>
  import jwt_decode from 'jwt-decode'
  import { ref, onMounted } from 'vue';
  import { defineTitle } from '@/Helpers';
  import useHelper from '@/Helpers';  
  import ContentHeader from '@/Components/ContentHeader.vue';
  import useDatosSession from '@/Composables/session';
  import FormPassword from './formpassword.vue'
  import PerfilForm from './Edit.vue'
  const { usuario, role } = useDatosSession();
  const { openModal } = useHelper();
  const titleHeader = ref({
      titulo: "Perfil",
      subTitulo: "",
      icon: "",
      vista: ""
  });
  const form = ref({
      id : '',
      name:'',
      password:'',
      password_confirmation:'', 
      role_id:'',  
      errors:[]
  });
  const formpassword = ref({
    current_password : '',
    password : '',
    password_confirmation : '',
    errors:[]
  });
  onMounted(() => {
      defineTitle(titleHeader.value.titulo)
  })

  const EditarPerfil = () => {
    openModal('#modalusuario')
    var titulo = document.getElementById("modalusuarioLabel");
    titulo.textContent = 'Editar Datos Personales';
    form.value.name = usuario.value.name,
    form.value.role_id = usuario.value.role_id,
    form.value.id = usuario.value.id
  }
const formcambiarclave = () => {
  openModal('#modalupdatepassword')
  var titulo = document.getElementById("modalupdatepasswordLabel");
  titulo.textContent = 'Cambiar Password';     
}
</script>
<template>
    <ContentHeader :title-header="titleHeader"></ContentHeader>
    <div class="app-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" style="width: 160px;" src="/imagenes/default.png" alt="User profile">
                </div>
                <h3 class="profile-username text-center">{{ usuario.name }}</h3>
                <p class="text-muted text-center">{{ role.nombre }}</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Rol</b> <a class="float-right">{{role.nombre}}</a>
                  </li>
                  <li class="list-group-item d-flex justify-content-center">
                    <button type="button" class="btn btn-info" title="Cambiar contraseña" @click="formcambiarclave()">
                      <i class="fas fa-lock"></i>
                    </button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-warning" @click.prevent="EditarPerfil()" title="Editar Datos">
                      <i class="fa fa-pen"></i>
                    </a>
                    <!-- <button type="button" class="btn btn-info" title="Cambiar Pin">
                      <i class="fa-solid fa-hashtag"></i>
                    </button> -->
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4">

          </div>
        </div>
      </div>
      <perfil-form :form="form"></perfil-form>
      <form-password :form="formpassword"></form-password>
    </div>
</template>
