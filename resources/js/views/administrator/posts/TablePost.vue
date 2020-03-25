<template>

    <div>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9">
                        <h5>Lista de Posts</h5>
                    </div>
                    <div class="col-3">
                        <slot name="buttons"></slot>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="post-table" class="table table-striped table-bordered responsive nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>TÍTULO</th>
                        <th>FECHA</th>
                        <th>TIPO CARD</th>
                        <th>DESCRIPCIÓN</th>
                        <th>CREADOR</th>
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

    import Transformers from '../../../utils/transformers';

    export default {
        data(){
            return {
                posts: [],
                postTable: ''
            }
        },
        methods: {
            async refreshTable(){
                const posts = await this.getPosts();
                this.postTable.clear().draw();
                this.postTable.rows.add(this.posts); // Add new data
                this.postTable.columns.adjust().draw();
            },
            async getPosts(){
                try {
                    const response = await axios.get('/posts');

                    if(response.status === 200){
                        this.posts = Transformers.keysToCamel(response.data);
                        return response.data;
                    }

                } catch (e){
                    console.log(e);
                }
            },
            async loadTable(){
                const posts = await this.getPosts();
                this.renderTable(this.posts);
            },
            async deletePost(id){
                try {
                    const response = await axios.delete(`/posts/${id}`);

                    if(response.status === 200){
                        const value = await Alerts.showDeletedMessage();

                        this.refreshTable();
                    }


                } catch(e) {
                    console.log(e);
                }
            },
            renderTable(posts){

                this.postTable = $('#post-table').DataTable({
                    data: posts,
                    scrollX: true,
                    language: JQueryDataTableES,
                    columnDefs: [
                        {
                            targets: 6,
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
                                                        class="dropdown-item btn-post-update"
                                                        data-id="${data}">
                                                        <i class="icon ion-edit"></i> Editar
                                                </button>
                                                <button type="button"
                                                        class="dropdown-item btn-post-delete"
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
                        {data: 'title'},
                        {data: 'dateTime'},
                        {data: 'cardType'},
                        {data: 'description'},
                        {data: 'user.name'},
                    ]
                });

            },
            events(){

                const _this = this;

                $(document).on('click', '.btn-post-update', function(e){
                    e.preventDefault();

                    const postId = $(this).data('id');

                    _this.$emit('on-click-update', postId);

                });

                $(document).on('click', '.btn-post-delete', function(e){
                    e.preventDefault();

                    const postId = $(this).data('id');

                    Alerts.showConfirmDeleteMessage().then( result => {
                        if(result.value){
                            _this.deletePost(postId);
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
