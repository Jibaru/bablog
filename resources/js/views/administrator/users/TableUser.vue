<template>

    <div>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9">
                        <h5>Lista de Usuarios</h5>
                    </div>
                    <div class="col-3">
                        <slot name="buttons"></slot>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="user-table" class="table table-striped table-bordered responsive nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>ROL</th>
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
                users: [],
                userTable: ''
            }
        },
        methods: {
            async refreshTable(){
                const users = await this.getUsers();
                this.userTable.clear().draw();
                this.userTable.rows.add(this.users); // Add new data
                this.userTable.columns.adjust().draw();
            },
            async getUsers(){
                try {
                    const response = await axios.get('/users');

                    if(response.status === 200){
                        this.users = response.data;
                        return response.data;
                    }

                } catch (e){
                    console.log(e);
                }
            },
            async loadTable(){
                const users = await this.getUsers();
                this.renderTable(this.users);
            },
            async deleteUser(id){
                try {
                    const response = await axios.delete(`/users/${id}`);

                    if(response.status === 200){
                        const value = await Alerts.showDeletedMessage();

                        this.refreshTable();
                    }


                } catch(e) {
                    console.log(e);
                }
            },
            renderTable(users){

                this.userTable = $('#user-table').DataTable({
                    data: users,
                    scrollX: true,
                    language: JQueryDataTableES,
                    columnDefs: [
                        {
                            targets: 4,
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
                                                        class="dropdown-item btn-user-update"
                                                        data-id="${data}">
                                                        <i class="icon ion-edit"></i> Editar
                                                </button>
                                                <button type="button"
                                                        class="dropdown-item btn-user-delete"
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
                        {data: 'email'},
                        {data: 'role.name'},
                    ]
                });

            },
            events(){

                const _this = this;

                $(document).on('click', '.btn-user-update', function(e){
                    e.preventDefault();

                    const userId = $(this).data('id');

                    _this.$emit('on-click-update', userId);

                });

                $(document).on('click', '.btn-user-delete', function(e){
                    e.preventDefault();

                    const userId = $(this).data('id');

                    Alerts.showConfirmDeleteMessage().then( result => {
                        if(result.value){
                            _this.deleteUser(userId);
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
