<template>

    <div>
        <form @submit.prevent="checkForm">
            <div class="form-group">
                <label>NOMBRE</label>
                <input v-model="category.name"
                       type="text"
                       class="form-control text-uppercase"
                       required>
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

    export default {
        data(){
            return {
                category: {
                    id: undefined,
                    name: '',
                },
                isEditing: false
            }
        },
        methods: {
            async getCategory(id){
                try{
                    const response = await axios.get(`categories/${id}`);

                    this.category.id = response.data.id;
                    this.category.name = response.data.name;

                    return response.data;
                } catch (e) {
                    console.log(e);
                }
            },
            async createCategory(){
                try{

                    const body = {};

                    body.name = this.category.name.toUpperCase();

                    const response = await axios.post('categories', body);

                    if(response.status === 201){
                        this.$emit('on-created', response.data);
                        this.clearForm();
                    }

                } catch (e) {
                    console.log(e);
                }
            },
            async updateCategory(){
                try{

                    const body = {};

                    body.name = this.category.name.toUpperCase();

                    const response = await axios.put(`categories/${this.category.id}`, body);

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
                    this.updateCategory();
                }else {
                    this.createCategory();
                }
            },
            clearForm(){
                this.category.id = undefined;
                this.category.name = '';
            }
        }
    }



</script>
