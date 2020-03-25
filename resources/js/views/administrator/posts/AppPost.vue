<template>

    <div>
        <app-modal
            id="post-modal"
            title="Post"
            custom-classes="post-modal"
            ref="app-modal">
            <template slot="modal-body">
                <form-post
                    ref="form-post"
                    @on-created="refreshAll"
                    @on-updated="refreshAll">
                </form-post>
            </template>
        </app-modal>
        <table-post
            ref="table-post"
            @on-click-update="showUpdateModal">
            <template slot="buttons">
                <button @click="showCreateModal"
                        type="button"
                        class="btn btn-success btn-sm float-right">
                    <i class="icon ion-plus"></i> NUEVO
                </button>
            </template>
        </table-post>
    </div>

</template>
<script>

    import TablePost from './TablePost';
    import FormPost from './FormPost';
    import AppModal from '../../../components/AppModal';

    export default {
        components: {
            'table-post': TablePost,
            'form-post': FormPost,
            'app-modal': AppModal
        },
        methods: {
            showModal(){
                this.$refs['app-modal'].show();
            },
            closeModal(){
                this.$refs['app-modal'].hide();
            },
            showUpdateModal(id){
                this.$refs['form-post'].clearForm();
                this.$refs['form-post'].getPost(id);
                this.$refs['form-post'].isEditing = true;
                this.showModal();
            },
            showCreateModal(){
                this.$refs['form-post'].clearForm();
                this.$refs['form-post'].isEditing = false;
                this.showModal();
            },
            refreshAll(){
                this.$refs['table-post'].refreshTable();
                this.closeModal();
            }
        }
    }

</script>
