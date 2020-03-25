<template>

    <div>
        <form @submit.prevent="checkForm">
            <div class="form-group">
                <label>NOMBRE</label>
                <input v-model="user.name"
                       type="text"
                       class="form-control text-uppercase"
                       required>
            </div>
            <div class="form-group">
                <label>EMAIL</label>
                <input v-model="user.email"
                       type="email"
                       class="form-control"
                       required>
            </div>
            <div class="form-group">
                <app-multiselect
                    v-model="user.role"
                    label="ROL"
                    placeholder="SELECCIONE"
                    :use-service="true"
                    url-service="roles"
                    :single-value-as-object="true"
                    required>
                </app-multiselect>
            </div>
            <div class="form-group">
                <app-multiselect
                    v-model="user.file"
                    label="ARCHIVO PERFIL"
                    placeholder="SELECCIONE"
                    :use-service="true"
                    url-service="roles"
                    :single-value-as-object="true"
                    required>
                </app-multiselect>
            </div>
            <div class="form-group">
                <label>CONTRASEÑA</label>
                <input v-model="user.password"
                       type="text"
                       class="form-control"
                       :required="!isEditing">
            </div>
            <div class="form-group">
                <button v-if="!isEditing"
                        type="submit"
                        class="btn btn-primary btn-block">GUARDAR</button>
                <button v-if="isEditing"
                        type="submit"
                        class="btn btn-success btn-block">ACTUALIZAR</button>
            </div>
        </form>

    </div>

</template>
<script>

    import AppMultiselect from '../../../components/AppMultiselect';

    export default {
        components: {
            'app-multiselect': AppMultiselect
        },
        data(){
            return {
                user: {
                    id: undefined,
                    name: '',
                    email: '',
                    password: '',
                    role: undefined,
                    file: undefined,
                },
                isEditing: false
            }
        },
        methods: {
            async getUser(id){
                try{
                    const response = await axios.get(`users/${id}`);

                    this.user.id = response.data.id;
                    this.user.name = response.data.name;
                    this.user.email = response.data.email;
                    this.user.role = response.data.role;
                    this.user.file = response.data.file;

                    return response.data;
                } catch (e) {
                    console.log(e);
                }
            },
            async createUser(){
                try{

                    const body = {};

                    body.name = this.user.name.toUpperCase();
                    body.email = this.user.email;
                    body.role_id = this.user.role.id;
                    body.file_id = this.user.file.id;
                    body.password = this.user.password;

                    const response = await axios.post('users', body);

                    if(response.status === 201){
                        this.$emit('on-created', response.data);
                        this.clearForm();
                    }

                } catch (e) {
                    console.log(e);
                }
            },
            async updateUser(){
                try{

                    const body = {};

                    body.name = this.user.name.toUpperCase();
                    body.email = this.user.email;
                    body.role_id = this.user.role.id;
                    body.file_id = this.user.file.id;
                    body.password = this.user.password;

                    const response = await axios.put(`users/${this.user.id}`, body);

                    if(response.status === 200){
                        this.$emit('on-updated', response.data);
                        this.isEditing = false;
                        this.clearForm();
                    }

                } catch (e) {
                    console.log(e);
                }
            },
            checkForm(){
                if(this.isEditing){
                    this.updateUser();
                }else {
                    this.createUser();
                }
            },
            clearForm(){
                this.user.id = undefined;
                this.user.name = '';
                this.user.email = '';
                this.user.role = undefined;
                this.user.file = undefined;
                this.user.password = '';
            }
        }
    }



</script>
