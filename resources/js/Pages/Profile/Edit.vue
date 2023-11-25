<script setup>
import { toRefs, onMounted } from 'vue';
import usePerfil from '@/Composables/perfil'
import useHelper from '@/Helpers';
import useRole from '@/Composables/roles'
const { Toast, hideModal } = useHelper();

const { errors, respuesta, actualizarPerfil } = usePerfil();
const { roles, listaRoles } = useRole();
const { form } = toRefs(props)
const  emit  =defineEmits(['cargardatos'])
const props = defineProps({
    form: Object
});
onMounted(() => {
    listarRoles()
})
const listarRoles = async () => {
    await listaRoles()
}


const guardarPerfil = async () => {
    await actualizarPerfil(form.value)
    form.value.errors = []
    if (errors.value) {
        form.value.errors = errors.value
    }
    if (respuesta.value.ok == 1) {
        form.value.errors = []
        Toast.fire({ icon: 'success', title: respuesta.value.mensaje })
        hideModal('#modalusuario')
        emit('cargardatos')
    }
}
const guardarcambios = () => {
    guardarPerfil()
}

</script>
<template>
    <!-- Modal -->
    <div class="modal fade" id="modalusuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalusuarioLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalusuarioLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="name">Nombre de Usuario</label>
                        <input type="hidden" v-model="form.user_id">
                        <input class="form-control" type="text" placeholder="Name" v-model="form.name"
                            :class="{ 'is-invalid': form.errors.name }" />
                        <small class="text-danger" v-for="error in form.errors.name" :key="error">{{ error }}</small>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Rol</label>
                        <select v-model="form.role_id" class="form-control"
                            :class="{ 'is-invalid': form.errors.role_id }">
                            <option v-for="role in roles" :key="role.id" :value="role.id"
                                :title="role.nombre">
                                {{ role.nombre }}
                            </option>
                        </select>
                        <small class="text-danger" v-for="error in form.errors.role_id" :key="error">{{ error }}</small>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="guardarcambios()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</template>