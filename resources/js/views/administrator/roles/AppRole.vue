<template>

    <div>
        <app-modal
            id="role-modal"
            title="Rol"
            ref="app-modal">
            <template slot="modal-body">
                <form-role
                    ref="form-role"
                    @on-created="refreshAll"
                    @on-updated="refreshAll">
                </form-role>
            </template>
        </app-modal>
        <table-role
            ref="table-role"
            @on-click-update="showUpdateModal">
            <template slot="buttons">
                <button @click="showCreateModal"
                        type="button"
                        class="btn btn-success btn-sm float-right">
                    <i class="icon ion-plus"></i> NUEVO
                </button>
            </template>
        </table-role>
    </div>

</template>
<script>

    import TableRole from './TableRole';
    import FormRole from './FormRole';
    import AppModal from '../../../components/AppModal';

    export default {
        components: {
            'table-role': TableRole,
            'form-role': FormRole,
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
                this.$refs['form-role'].clearForm();
                this.$refs['form-role'].getRole(id);
                this.$refs['form-role'].isEditing = true;
                this.showModal();
            },
            showCreateModal(){
                this.$refs['form-role'].clearForm();
                this.$refs['form-role'].isEditing = false;
                this.showModal();
            },
            refreshAll(){
                this.$refs['table-role'].refreshTable();
                this.closeModal();
            }
        }
    }

</script>
