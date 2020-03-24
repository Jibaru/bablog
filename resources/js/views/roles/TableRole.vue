<template>

    <div>

        <div class="card">
            <h5 class="card-header">
                Lista de Roles
            </h5>
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

            async getRoles(){
                try {
                    const response = await axios.get('/roles');

                    this.roles = response.data;

                    return response.data;

                } catch (e){

                    console.log(e);

                }
            },
            async loadTable(){
                const roles = await this.getRoles();
                this.renderTable(this.roles);
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
                                                <i class="fas fa-bars"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button type="button"
                                                        class="dropdown-item btn-egress-update"
                                                        data-id="${data}">
                                                        <i class='fas fa-edit'></i> Editar
                                                </button>
                                                <button type="button"
                                                        class="dropdown-item btn-egress-delete"
                                                        data-id="${data}">
                                                        <i class='fas fa-trash-alt'></i> Eliminar
                                                </button>
                                                <button type="button"
                                                        class="dropdown-item btn-egress-view"
                                                        data-id="${data}">
                                                        <i class="fas fa-eye"></i> Ver
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

            }
        },
        mounted(){
            this.loadTable();
        }
    }

</script>
