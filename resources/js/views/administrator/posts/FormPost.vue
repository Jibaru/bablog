<template>

    <div>
        <form @submit.prevent="checkForm">
            <div class="form-group">
                <label>TÍTULO</label>
                <input v-model="post.title"
                       type="text"
                       class="form-control text-uppercase"
                       required>
            </div>
            <div class="form-group">
                <label>DESCRIPCIÓN</label>
                <input v-model="post.description"
                       type="text"
                       class="form-control"
                       required>
            </div>
            <div class="form-group">
                <app-multiselect
                    v-model="post.category"
                    label="CATEGORÍA"
                    placeholder="SELECCIONE"
                    :use-service="true"
                    url-service="categories"
                    :single-value-as-object="true"
                    required>
                </app-multiselect>
            </div>
            <div class="form-group">
                <app-multiselect
                    v-model="post.type"
                    label="TIPO"
                    placeholder="SELECCIONE"
                    :optionList="typeList"
                    :single-value-as-object="true"
                    required>
                </app-multiselect>
            </div>
            <div class="form-group">
                <app-multiselect
                    v-model="post.cardType"
                    label="TIPO CARD"
                    placeholder="SELECCIONE"
                    :optionList="cardTypeList"
                    :single-value-as-object="true"
                    required>
                </app-multiselect>
            </div>
            <div class="form-group">
                <app-multiselect
                    v-model="post.user"
                    label="USUARIO"
                    placeholder="SELECCIONE"
                    :use-service="true"
                    url-service="users"
                    :single-value-as-object="true"
                    required>
                </app-multiselect>
            </div>
            <div v-if="post.cardType && post.cardType.id !== 'TINY'"
                 class="form-group">
                <app-multiselect
                    v-model="post.file"
                    label="IMAGEN CARD"
                    placeholder="SELECCIONE"
                    :use-service="true"
                    url-service="files"
                    :single-value-as-object="true">
                </app-multiselect>
            </div>
            <div class="form-group">
                <label>CONTENIDO</label>
                <div>
                    <button @click="addToContent(contentA)"
                            type="button"
                            class="btn btn-sm btn-primary">P Top Area (Centered)</button>
                    <button @click="addToContent(contentC)"
                            type="button"
                            class="btn btn-sm btn-primary">P Normal</button>
                    <button @click="addToContent(contentB)"
                            type="button"
                            class="btn btn-sm btn-primary">Post Image</button>
                </div>
                <textarea v-model="post.content"
                          id="post-content"
                          class="form-control"
                          rows="10"
                          required>
                </textarea>
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
                post: {
                    id: undefined,
                    title: '',
                    dateTime: '',
                    type: undefined,
                    cardType: undefined,
                    description: '',
                    content: '',
                    user: undefined,
                    category: undefined,
                    file: undefined,
                },
                isEditing: false,
                typeList: [
                    {
                        id: 'CENTERED',
                        name: 'CENTRADO'
                    },
                    {
                        id: 'SIDEBAR',
                        name: 'SIDEBAR'
                    },
                    {
                        id: 'LANDING',
                        name: 'LANDING'
                    },
                ],
                cardTypeList: [
                    {
                        id: 'NORMAL',
                        name: 'NORMAL'
                    },
                    {
                        id: 'TINY',
                        name: 'PEQUEÑO'
                    },
                    {
                        id: 'BIG',
                        name: 'GRANDE'
                    },
                ],
                contentA: '<div class="post-top-area"><p class="para">[]</p></div>',
                contentB: '<div class="post-image"><img src="[]" alt="BaBlogImage"></div>',
                contentC: '<p class="para">[]</p>',
            }
        },
        methods: {
            async getPost(id){
                try{
                    const response = await axios.get(`posts/${id}`);

                    this.post.id = response.data.id;
                    this.post.title = response.data.title;
                    this.post.dateTime = response.data.date_time;
                    this.post.type = this.typeList.find( t => t.id === response.data.type);
                    this.post.cardType = this.cardTypeList.find(c => c.id === response.data.card_type);
                    this.post.description = response.data.description;
                    this.post.content = response.data.content;
                    this.post.user = response.data.user;
                    this.post.category = response.data.category;
                    this.post.file = response.data.file;

                    return response.data;
                } catch (e) {
                    console.log(e);
                }
            },
            async createPost(){
                try{

                    const body = {};

                    body.title = this.post.title.toUpperCase();
                    body.date_time = moment(Date.now()).format('YYYY-MM-DD hh:mm:ss');
                    body.type = this.post.type.id;
                    body.card_type = this.post.cardType.id;
                    body.description = this.post.description;
                    body.content = this.post.content;
                    body.user_id = this.post.user.id;
                    body.category_id = this.post.category.id;
                    body.file_id = this.post.file.id;

                    const response = await axios.post('posts', body);

                    if(response.status === 201){
                        this.$emit('on-created', response.data);
                        this.clearForm();
                    }

                } catch (e) {
                    console.log(e);
                }
            },
            async updatePost(){
                try{

                    const body = {};

                    body.title = this.post.title.toUpperCase();
                    body.date_time = this.post.dateTime;
                    body.type = this.post.type.id;
                    body.card_type = this.post.cardType.id;
                    body.description = this.post.description;
                    body.content = this.post.content;
                    body.user_id = this.post.user.id;
                    body.category_id = this.post.category.id;
                    body.file_id = this.post.file.id;

                    const response = await axios.put(`posts/${this.post.id}`, body);

                    if(response.status === 200){
                        this.$emit('on-updated', response.data);
                        this.isEditing = false;
                        this.clearForm();
                    }

                } catch (e) {
                    console.log(e);
                }
            },
            addToContent(tagsHTML){
                const cursorStart = $('#post-content').prop("selectionStart");
                const cursorEnd = $('#post-content').prop("selectionEnd");
                if(cursorStart === 0 && cursorEnd === 0){
                    this.post.content += tagsHTML.replace('[]', '');
                }else if((cursorStart === 0 && cursorEnd !== 0 ||cursorStart !== 0 && cursorEnd !== 0)
                        && (cursorStart !== cursorEnd)){
                    const selection = this.post.content.substring(cursorStart, cursorEnd);
                    const newText = tagsHTML.replace('[]', selection);
                    this.post.content = this.post.content.replace(selection, newText);
                }else if(cursorStart !== 0 && cursorEnd !== 0 && cursorStart === cursorEnd){
                    this.post.content = this.post.content.substring(0, cursorStart)
                        + tagsHTML.replace('[]', '') + this.post.content.substring(cursorEnd, this.post.content.length);
                }
            },
            checkForm(){

                if(this.isEditing){
                    this.updatePost();
                }else {
                    this.createPost();
                }
            },
            clearForm(){
                this.post.id = undefined;
                this.post.title = '';
                this.post.dateTime = '';
                this.post.type = undefined;
                this.post.cardType = undefined;
                this.post.description = '';
                this.post.content = '';
                this.post.user = undefined;
                this.post.category = undefined;
                this.post.file = undefined;
            }
        }
    }



</script>
