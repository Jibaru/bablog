<template>

    <div>
        <section class="comment-section" style="background: #EDF3F3">
            <div class="container">
                <h4><b>ESCRIBE UN COMENTARIO</b></h4>
                <div class="row">

                    <div class="col-lg-8 col-md-12">
                        <div class="comment-form">
                            <form method="post" @submit.prevent="checkCommentForm">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea
                                            v-model="comment.content"
                                            name="contact-form-message"
                                            rows="2"
                                            class="text-area-messge form-control"
                                            placeholder="Comentario"
                                            aria-required="true"
                                            aria-invalid="false"
                                            :disabled="!user.id"
                                            required>
                                        </textarea >
                                    </div>
                                    <div class="col-sm-12">
                                        <div v-if="!user.id"
                                             class="alert alert-danger">
                                            Necesitas estar logueado para comentar
                                        </div>
                                        <button
                                            v-if="!user.id"
                                            @click="$router.push('/login')"
                                            class="submit-btn btn-block"
                                            type="button">
                                            <b>INICIAR SESIÓN</b>
                                        </button>
                                        <button
                                            v-else
                                            class="submit-btn btn-block"
                                            type="submit"
                                            :disabled="isCommenting">
                                            <b v-show="!isCommenting">PUBLICAR COMENTARIO</b>
                                            <b v-show="isCommenting">PUBLICANDO COMENTARIO...</b>
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <h4><b>COMENTARIOS({{post.commentsCount}})</b></h4>

                        <div v-for="(comment, i) in post.comments" :key="i">
                            <div class="commnets-area">

                                <div class="comment">

                                    <div class="post-info">

                                        <div class="left-area">
                                            <a class="avatar" href="#"><img :src="comment.user.file.url" alt="Profile Image"></a>
                                        </div>

                                        <div class="middle-area">
                                            <a class="name" href="#"><b>{{comment.user.name}}</b></a>
                                            <h6 class="date">{{comment.dateTime}}</h6>
                                        </div>

                                        <div class="right-area">
                                            <h5 class="reply-btn" >
                                                <a style="cursor: pointer"
                                                   @click="showReplyForm = true; currentCommentId = comment.id">
                                                    <b>RESPONDER</b>
                                                </a>
                                            </h5>
                                        </div>

                                    </div>

                                    <p>{{comment.content}}</p>

                                </div>
                                <div class="comment-form" v-if="showReplyForm && currentCommentId == comment.id">
                                    <form method="post" @submit.prevent="checkReplyCommentForm">
                                        <div class="row">
                                            <div class="col-sm-12">
                                        <textarea
                                            v-model="replyComment.content"
                                            name="contact-form-message"
                                            rows="2"
                                            class="text-area-messge form-control"
                                            placeholder="Comentario"
                                            aria-required="true"
                                            aria-invalid="false"
                                            :disabled="!user.id"
                                            required>
                                        </textarea >
                                            </div>
                                            <div class="col-sm-12">
                                                <div v-if="!user.id"
                                                     class="alert alert-danger">
                                                    Necesitas estar logueado para comentar
                                                </div>
                                                <button
                                                    v-if="!user.id"
                                                    @click="$router.push('/login')"
                                                    class="submit-btn btn-block"
                                                    type="button">
                                                    <b>INICIAR SESIÓN</b>
                                                </button>
                                                <button
                                                    v-else
                                                    class="submit-btn btn-block"
                                                    type="submit"
                                                    :disabled="isCommentingReply">
                                                    <b v-show="!isCommentingReply">RESPONDER</b>
                                                    <b v-show="isCommentingReply">PUBLICANDO COMENTARIO...</b>
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                                <div v-for="(reply, j) in comment.replies" :key="j" class="comment">
                                    <h5 class="reply-for">Respuesta a <a href="#"><b>{{comment.user.name}}</b></a></h5>

                                    <div class="post-info">

                                        <div class="left-area">
                                            <a class="avatar" href="#"><img :src="reply.user.file.url" alt="Profile Image"></a>
                                        </div>

                                        <div class="middle-area">
                                            <a class="name" href="#"><b>{{comment.user.name}}</b></a>
                                            <h6 class="date">{{comment.dateTime}}</h6>
                                        </div>

                                        <!--<div class="right-area">
                                            <h5 class="reply-btn" ><a href="#"><b>RESPONDER</b></a></h5>
                                        </div>-->

                                    </div>

                                    <p>{{reply.content}}</p>

                                </div>

                            </div>
                        </div>

                        <a class="more-comment-btn" href="#"><b>CARGAR MÁS COMENTARIOS</b></a>

                    </div>

                </div>

            </div>
        </section>
    </div>

</template>

<script>

    import Transformers from '../utils/transformers';

    export default {
        name: 'CommentSection',
        props: {
            post: {
                type: Object
            }
        },
        data(){
            return {
                comment: {
                    content: '',
                    dateTime: '',
                    thread: '',
                    userId: '',
                    postId: ''
                },
                replyComment: {
                    content: '',
                    dateTime: '',
                    thread: '',
                    userId: '',
                    postId: ''
                },
                user: {
                    id: undefined,
                    name: '',
                    email: '',
                    file: {
                        url: ''
                    }
                },
                showReplyForm: false,
                isCommenting: false,
                isCommentingReply: false,
                currentCommentId: undefined
            }
        },
        methods: {
            async createComment(comment){
                try {
                    const body = {};
                    body.content = comment.content;
                    body.date_time = comment.dateTime;
                    body.thread = comment.thread;
                    body.user_id = comment.userId;
                    body.post_id = comment.postId;

                    const response = await axios.post('/comments', body);

                    this.isCommenting = false;
                    this.isCommentingReply = false;
                    if(response.status === 201){
                        this.clearForm();
                        this.getPost(this.post.id);
                    }
                } catch(e){
                    this.isCommenting = false;
                    this.isCommentingReply = false;
                    console.log(e);
                }
            },

            async getAuth(){
                try {
                    const response = await axios.get('/auth');

                    if(response.status === 200){
                        if(response.data !== '' && response.data !== undefined){
                            this.user.id = response.data.id;
                            this.user.name = response.data.name;
                            this.user.email = response.data.email;
                            this.user.file.url = response.data.file.url;
                        }
                    }

                }catch(e){
                    console.log(e);
                }
            },

            async getPost(id){
                try {

                    const response = await axios.get(`posts/${id}`);

                    if(response.status === 200){
                        const data = Transformers.keysToCamel(response.data);
                        this.$emit('on-comment', data);
                    }

                } catch(e) {
                    console.log(e);
                }
            },

            checkCommentForm(){
                this.isCommenting = true;
                this.comment.thread = undefined;
                this.comment.userId = this.user.id;
                this.comment.postId = this.post.id;
                this.comment.dateTime = moment(Date.now()).format('YYYY-MM-DD hh:mm:ss');
                this.createComment(this.comment);
            },

            checkReplyCommentForm(){
                this.isCommentingReply = true;
                this.replyComment.thread = this.currentCommentId;
                this.replyComment.userId = this.user.id;
                this.replyComment.postId = this.post.id;
                this.replyComment.dateTime = moment(Date.now()).format('YYYY-MM-DD hh:mm:ss');
                this.createComment(this.replyComment);
            },

            clearForm(){
                this.comment.content = '';
                this.comment.dateTime = '';
                this.comment.thread = '';
                this.comment.userId = '';
                this.comment.postId = '';

                this.replyComment.content = '';
                this.replyComment.dateTime = '';
                this.replyComment.thread = '';
                this.replyComment.userId = '';
                this.replyComment.postId = '';

                this.currentCommentId = undefined;
            },
            events(){
                $(document).on('click',document, function(){
                    this.showReplyForm = false;
                });
            }
        },
        mounted() {
            this.getAuth();
            this.events();
        }
    }

</script>
