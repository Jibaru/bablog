<template>

    <div>
        <section class="comment-section" style="background: #EDF3F3">
            <div class="container">
                <h4><b>ESCRIBE UN COMENTARIO</b></h4>
                <div class="row">

                    <div class="col-lg-8 col-md-12">
                        <div class="comment-form">
                            <form method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="email" aria-required="true" name="contact-form-name" class="form-control"
                                               placeholder="Email" aria-invalid="true" required >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" aria-required="true" name="contact-form-email" class="form-control"
                                               placeholder="Contraseña" aria-invalid="true" required>
                                    </div>

                                    <div class="col-sm-12">
									<textarea name="contact-form-message" rows="2" class="text-area-messge form-control"
                                              placeholder="Comentario" aria-required="true" aria-invalid="false"></textarea >
                                    </div>
                                    <div class="col-sm-12">
                                        <button class="submit-btn" type="submit" id="form-submit"><b>PUBLICAR COMENTARIO</b></button>
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
                                            <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg" alt="Profile Image"></a>
                                        </div>

                                        <div class="middle-area">
                                            <a class="name" href="#"><b>{{comment.user.name}}</b></a>
                                            <h6 class="date">{{comment.dateTime}}</h6>
                                        </div>

                                        <div class="right-area">
                                            <h5 class="reply-btn" ><a href="#"><b>RESPONDER</b></a></h5>
                                        </div>

                                    </div>

                                    <p>{{comment.content}}</p>

                                </div>

                                <div v-for="(reply, j) in comment.replies" :key="j" class="comment">
                                    <h5 class="reply-for">Respuesta a <a href="#"><b>{{comment.user.name}}</b></a></h5>

                                    <div class="post-info">

                                        <div class="left-area">
                                            <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg" alt="Profile Image"></a>
                                        </div>

                                        <div class="middle-area">
                                            <a class="name" href="#"><b>{{comment.user.name}}</b></a>
                                            <h6 class="date">{{comment.dateTime}}</h6>
                                        </div>

                                        <div class="right-area">
                                            <h5 class="reply-btn" ><a href="#"><b>RESPONDER</b></a></h5>
                                        </div>

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

    export default {
        name: 'CommentSection',
        props: {
            post: {
                type: Object
            }
        },
        methods: {

        },
    }

</script>
