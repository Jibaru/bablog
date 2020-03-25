<template>

    <div>
        <app-modal
            id="user-modal"
            title="Usuario"
            ref="app-modal">
            <template slot="modal-body">
                <form-user
                    ref="form-user"
                    @on-created="refreshAll"
                    @on-updated="refreshAll">
                </form-user>
            </template>
        </app-modal>
        <table-user
            ref="table-user"
            @on-click-update="showUpdateModal">
            <template slot="buttons">
                <button @click="showCreateModal"
                        type="button"
                        class="btn btn-success btn-sm float-right">
                    <i class="icon ion-plus"></i> NUEVO
                </button>
            </template>
        </table-user>
    </div>

</template>
<script>

    import TableUser from './TableUser';
    import FormUser from './FormUser';
    import AppModal from '../../../components/AppModal';

    export default {
        components: {
            'table-user': TableUser,
            'form-user': FormUser,
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
                this.$refs['form-user'].clearForm();
                this.$refs['form-user'].getUser(id);
                this.$refs['form-user'].isEditing = true;
                this.showModal();
            },
            showCreateModal(){
                this.$refs['form-user'].clearForm();
                this.$refs['form-user'].isEditing = false;
                this.showModal();
            },
            refreshAll(){
                this.$refs['table-user'].refreshTable();
                this.closeModal();
            }
        }
    }

</script>
