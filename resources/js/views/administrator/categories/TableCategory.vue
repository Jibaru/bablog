<template>

    <div>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9">
                        <h5>Lista de Categorías</h5>
                    </div>
                    <div class="col-3">
                        <slot name="buttons"></slot>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="category-table" class="table table-striped table-bordered responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>

    </div>

</template>

<script>

    export default {
        data(){
            return {
                categories: [],
                categoryTable: ''
            }
        },
        methods: {
            async refreshTable(){
                const categories = await this.getCategories();
                this.categoryTable.clear().draw();
                this.categoryTable.rows.add(this.categories);
                this.categoryTable.columns.adjust().draw();
            },
            async getCategories(){
                try {
                    const response = await axios.get('/categories');

                    if(response.status === 200){
                        this.categories = response.data;
                        return response.data;
                    }

                } catch (e){

                    console.log(e);

                }
            },
            async loadTable(){
                const categories = await this.getCategories();
                this.renderTable(this.categories);
            },
            async deleteCategory(id){
                try {
                    const response = await axios.delete(`/categories/${id}`);

                    if(response.status === 200){
                        const value = await Alerts.showDeletedMessage();

                        this.refreshTable();
                    }


                } catch(e) {
                    console.log(e);
                }
            },
            renderTable(categories){

                this.categoryTable = $('#category-table').DataTable({
                    data: categories,
                    scrollX: true,
                    language: JQueryDataTableES,
                    columnDefs: [
                        {
                            targets: 2,
                            data: "id",
                            className: "dt-body-center",
                            width: "15%",
                            render: (data, type, full, meta) => {
                                return `
                                        <div class="btn-group dropleft" data-id="${data}">
                                            <button type="button"
                                                    class="btn btn-primary btn-sm dropdown-toggle"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="icon ion-settings"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button type="button"
                                                        class="dropdown-item btn-category-update"
                                                        data-id="${data}">
                                                        <i class="icon ion-edit"></i> Editar
                                                </button>
                                                <button type="button"
                                                        class="dropdown-item btn-category-delete"
                                                        data-id="${data}">
                                                        <i class="icon ion-trash-a"></i> Eliminar
                                                </button>
                                            </div>
                                        </div>
                                    `;
                            }
                        }
                    ],
                    columns: [
                        {data: 'id'},
                        {data: 'name'},
                    ]
                });

            },
            events(){

                const _this = this;

                $(document).on('click', '.btn-category-update', function(e){
                    e.preventDefault();

                    const categoryId = $(this).data('id');

                    _this.$emit('on-click-update', categoryId);

                });

                $(document).on('click', '.btn-category-delete', function(e){
                    e.preventDefault();

                    const categoryId = $(this).data('id');

                    Alerts.showConfirmDeleteMessage().then( result => {
                         if(result.value){
                             _this.deleteCategory(categoryId);
                         }
                    });

                });
            }
        },
        mounted(){
            this.loadTable();
            this.events();
        }
    }

</script>
