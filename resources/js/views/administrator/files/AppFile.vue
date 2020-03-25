<template>

    <div>
        <app-modal
            id="file-modal"
            title="Archivo"
            ref="app-modal">
            <template slot="modal-body">
                <form-file
                    ref="form-file"
                    @on-created="refreshAll"
                    @on-updated="refreshAll">
                </form-file>
            </template>
        </app-modal>
        <table-file
            ref="table-file"
            @on-click-update="showUpdateModal">
            <template slot="buttons">
                <button @click="showCreateModal"
                        type="button"
                        class="btn btn-success btn-sm float-right">
                    <i class="icon ion-plus"></i> NUEVO
                </button>
            </template>
        </table-file>
    </div>

</template>
<script>

    import TableFile from './TableFile';
    import FormFile from './FormFile';
    import AppModal from '../../../components/AppModal';

    export default {
        components: {
            'table-file': TableFile,
            'form-file': FormFile,
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
                this.$refs['form-file'].clearForm();
                this.$refs['form-file'].getFile(id);
                this.$refs['form-file'].isEditing = true;
                this.showModal();
            },
            showCreateModal(){
                this.$refs['form-file'].clearForm();
                this.$refs['form-file'].isEditing = false;
                this.showModal();
            },
            refreshAll(){
                this.$refs['table-file'].refreshTable();
                this.closeModal();
            }
        }
    }

</script>
