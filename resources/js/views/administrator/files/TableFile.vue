<template>

    <div>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9">
                        <h5>Lista de Archivos</h5>
                    </div>
                    <div class="col-3">
                        <slot name="buttons"></slot>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="file-table" class="table table-striped table-bordered responsive nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>TIPO</th>
                        <th>FORMATO</th>
                        <th>URL</th>
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
                files: [],
                fileTable: ''
            }
        },
        methods: {
            async refreshTable(){
                const files = await this.getFiles();
                this.fileTable.clear().draw();
                this.fileTable.rows.add(this.files); // Add new data
                this.fileTable.columns.adjust().draw();
            },
            async getFiles(){
                try {
                    const response = await axios.get('/files');

                    if(response.status === 200){
                        this.files = response.data;
                        return response.data;
                    }

                } catch (e){
                    console.log(e);
                }
            },
            async loadTable(){
                const files = await this.getFiles();
                this.renderTable(this.files);
            },
            async deleteFile(id){
                try {
                    const response = await axios.delete(`/files/${id}`);

                    if(response.status === 200){
                        const value = await Alerts.showDeletedMessage();

                        this.refreshTable();
                    }


                } catch(e) {
                    console.log(e);
                }
            },
            renderTable(files){

                this.fileTable = $('#file-table').DataTable({
                    data: files,
                    scrollX: true,
                    language: JQueryDataTableES,
                    columnDefs: [
                        {
                            targets: 5,
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
                                                        class="dropdown-item btn-file-update"
                                                        data-id="${data}">
                                                        <i class="icon ion-edit"></i> Editar
                                                </button>
                                                <button type="button"
                                                        class="dropdown-item btn-file-delete"
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
                        {data: 'type'},
                        {data: 'format'},
                        {data: 'url'},
                    ]
                });

            },
            events(){

                const _this = this;

                $(document).on('click', '.btn-file-update', function(e){
                    e.preventDefault();

                    const fileId = $(this).data('id');

                    _this.$emit('on-click-update', fileId);

                });

                $(document).on('click', '.btn-file-delete', function(e){
                    e.preventDefault();

                    const fileId = $(this).data('id');

                    Alerts.showConfirmDeleteMessage().then( result => {
                        if(result.value){
                            _this.deleteFile(fileId);
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
