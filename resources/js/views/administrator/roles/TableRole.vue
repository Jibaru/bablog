<template>

    <div>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9">
                        <h5>Lista de Roles</h5>
                    </div>
                    <div class="col-3">
                        <slot name="buttons"></slot>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="role-table" class="table table-striped table-bordered responsive nowrap" style="width:100%">
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
                roles: [],
                roleTable: ''
            }
        },
        methods: {
            async refreshTable(){
                const roles = await this.getRoles();
                this.roleTable.clear().draw();
                this.roleTable.rows.add(this.roles); // Add new data
                this.roleTable.columns.adjust().draw();
            },
            async getRoles(){
                try {
                    const response = await axios.get('/roles');

                    if(response.status === 200){
                        this.roles = response.data;
                        return response.data;
                    }

                } catch (e){

                    console.log(e);

                }
            },
            async loadTable(){
                const roles = await this.getRoles();
                this.renderTable(this.roles);
            },
            async deleteRole(id){
                try {
                    const response = await axios.delete(`/roles/${id}`);

                    if(response.status === 200){
                        const value = await Alerts.showDeletedMessage();

                        this.refreshTable();
                    }


                } catch(e) {
                    console.log(e);
                }
            },
            renderTable(roles){
                console.log($('#role-table'));
                this.roleTable = $('#role-table').DataTable({
                    data: roles,
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
                                                        class="dropdown-item btn-role-update"
                                                        data-id="${data}">
                                                        <i class="icon ion-edit"></i> Editar
                                                </button>
                                                <button type="button"
                                                        class="dropdown-item btn-role-delete"
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

                $(document).on('click', '.btn-role-update', function(e){
                    e.preventDefault();

                    const roleId = $(this).data('id');

                    _this.$emit('on-click-update', roleId);

                });

                $(document).on('click', '.btn-role-delete', function(e){
                    e.preventDefault();

                    const roleId = $(this).data('id');

                    Alerts.showConfirmDeleteMessage().then( result => {
                         if(result.value){
                             _this.deleteRole(roleId);
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
