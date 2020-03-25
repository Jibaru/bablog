<template>

    <div>
        <form @submit.prevent="checkForm">
            <div class="form-group">
                <label>NOMBRE</label>
                <input v-model="role.name"
                       type="text"
                       class="form-control text-uppercase"
                       required>
            </div>
            <div class="form-group">
                <label>PERMISO</label>
                <input v-model="role.permission"
                       type="number"
                       class="form-control"
                       required>
            </div>
            <div class="form-group">
                <!--<app-multiselect
                    label="TÉCNICOS"
                    placeholder="SELECCIONE"
                    :use-service="true"
                    url-service="roles"
                    :single-value-as-object="true"
                    required>
                </app-multiselect>-->
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
                role: {
                    id: undefined,
                    name: '',
                    permission: ''
                },
                isEditing: false
            }
        },
        methods: {
            async getRole(id){
                try{
                    const response = await axios.get(`roles/${id}`);

                    this.role.id = response.data.id;
                    this.role.name = response.data.name;
                    this.role.permission = response.data.permission;

                    return response.data;
                } catch (e) {
                    console.log(e);
                }
            },
            async createRole(){
                try{

                    const body = {};

                    body.name = this.role.name.toUpperCase();
                    body.permission = this.role.permission;

                    const response = await axios.post('roles', body);

                    if(response.status === 201){
                        this.$emit('on-created', response.data);
                        this.clearForm();
                    }

                } catch (e) {
                    console.log(e);
                }
            },
            async updateRole(){
                try{

                    const body = {};

                    body.name = this.role.name.toUpperCase();
                    body.permission = this.role.permission;

                    const response = await axios.put(`roles/${this.role.id}`, body);

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
                    this.updateRole();
                }else {
                    this.createRole();
                }
            },
            clearForm(){
                this.role.id = undefined;
                this.role.name = '';
                this.role.permission = '';
            }
        }
    }



</script>
