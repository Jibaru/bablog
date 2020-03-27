<template>

    <div>
        <form @submit.prevent="checkForm">
            <div class="form-group">
                <label>NOMBRE</label>
                <input v-model="file.name"
                       type="text"
                       class="form-control text-uppercase"
                       required>
            </div>
            <div class="form-group">
                <label>TIPO</label>
                <input v-model="file.type"
                       type="text"
                       class="form-control text-uppercase"
                       required>
            </div>
            <div class="form-group">
                <label>PATH</label>
                <input v-model="file.path"
                       type="text"
                       class="form-control"
                       required>
            </div>
            <div class="form-group">
                <label>FORMATO</label>
                <input v-model="file.format"
                       type="text"
                       class="form-control text-uppercase"
                       required>
            </div>
            <div class="form-group">
                <app-multiselect
                    v-model="file.local"
                    label="LOCAL"
                    placeholder="SELECCIONE"
                    :optionList="statusList"
                    :single-value-as-object="true"
                    required>
                </app-multiselect>
            </div>
            <div v-if="file.url" class="form-group alert alert-success text-center">
                <a :href="file.url" target="_blank">VER ARCHIVO</a>
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
                file: {
                    id: undefined,
                    name: '',
                    path: '',
                    url: '',
                    format: '',
                    type: '',
                    local: undefined
                },
                statusList: [
                    {
                        id: 0,
                        name: 'NO'
                    },
                    {
                        id: 1,
                        name: 'SI'
                    },
                ],
                isEditing: false
            }
        },
        methods: {
            async getFile(id){
                try{
                    const response = await axios.get(`files/${id}`);

                    this.file.id = response.data.id;
                    this.file.name = response.data.name;
                    this.file.path = response.data.path;
                    this.file.format = response.data.format;
                    this.file.url = response.data.url;
                    this.file.type = response.data.type;
                    this.file.local = this.statusList.find( s => s.id === response.data.local);

                    return response.data;
                } catch (e) {
                    console.log(e);
                }
            },
            async createFile(){
                try{

                    const body = {};

                    body.name = this.file.name.toUpperCase();
                    body.path = this.file.path;
                    body.format = this.file.format.toUpperCase();
                    body.type = this.file.type.toUpperCase();
                    body.local = this.file.local.id;

                    const response = await axios.post('files', body);

                    if(response.status === 201){
                        this.$emit('on-created', response.data);
                        this.clearForm();
                    }

                } catch (e) {
                    console.log(e);
                }
            },
            async updateFile(){
                try{

                    const body = {};

                    body.name = this.file.name.toUpperCase();
                    body.path = this.file.path;
                    body.format = this.file.format.toUpperCase();
                    body.type = this.file.type.toUpperCase();
                    body.local = this.file.local.id;

                    const response = await axios.put(`files/${this.file.id}`, body);

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
                    this.updateFile();
                }else {
                    this.createFile();
                }
            },
            clearForm(){
                this.file.id = undefined;
                this.file.name = '';
                this.file.type = '';
                this.file.path = '';
                this.file.format = '';
                this.file.url = '';
                this.file.local = undefined;
            }
        }
    }



</script>
