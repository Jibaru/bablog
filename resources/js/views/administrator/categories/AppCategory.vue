<template>

    <div>
        <app-modal
            id="category-modal"
            title="Categoría"
            ref="app-modal">
            <template slot="modal-body">
                <form-category
                    ref="form-category"
                    @on-created="refreshAll"
                    @on-updated="refreshAll">
                </form-category>
            </template>
        </app-modal>
        <table-category
            ref="table-category"
            @on-click-update="showUpdateModal">
            <template slot="buttons">
                <button @click="showCreateModal"
                        type="button"
                        class="btn btn-success btn-sm float-right">
                    <i class="icon ion-plus"></i> NUEVO
                </button>
            </template>
        </table-category>
    </div>

</template>
<script>

    import TableCategory from './TableCategory';
    import FormCategory from './FormCategory';
    import AppModal from '../../../components/AppModal';

    export default {
        components: {
            'table-category': TableCategory,
            'form-category': FormCategory,
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
                this.$refs['form-category'].clearForm();
                this.$refs['form-category'].getCategory(id);
                this.$refs['form-category'].isEditing = true;
                this.showModal();
            },
            showCreateModal(){
                this.$refs['form-category'].clearForm();
                this.$refs['form-category'].isEditing = false;
                this.showModal();
            },
            refreshAll(){
                this.$refs['table-category'].refreshTable();
                this.closeModal();
            }
        }
    }

</script>
