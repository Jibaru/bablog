<template>

    <div>
        <div class="main-post-centered">

            <div class="post-top-area">

                <h5 class="pre-title">{{post.category.name}}</h5>

                <h3 class="title">
                    <a href="#">
                        <b>{{post.title}}</b>
                    </a>
                </h3>

                <div class="post-info">

                    <div class="left-area">
                        <a class="avatar" href="#"><img :src="post.user.file.url" alt="Profile Image"></a>
                    </div>

                    <div class="middle-area">
                        <a class="name" href="#"><b>{{post.user.name}}</b></a>
                        <h6 class="date">{{post.dateTime}}</h6>
                    </div>

                </div>

            </div>

            <div v-html="post.content"></div>

            <!--<div class="post-top-area">
                <p class="para"></p>
            </div>

            <div class="post-image"><img src="images/blog-1-1000x600.jpg" alt="Blog Image"></div>

            <div class="post-bottom-area">
                <p class="para"></p>
            </div>-->

            <div class="post-bottom-area">

                <ul class="tags">
                    <li><a href="#">Informática</a></li>
                    <li><a href="#">Programación</a></li>
                    <li><a href="#">Otros</a></li>
                    <li><a href="#">Gaaa</a></li>
                </ul>

                <div class="post-icons-area">
                    <ul class="post-icons">
                        <li>
                            <a :class="{'icon-gray-jibaru': !post.liked, 'icon-blue-jibaru': post.liked}"
                               href="javascript:void(0);"
                               @click="!post.liked ? createLike : null">
                                <i class="ion-heart"></i>{{post.likesCount}}
                            </a>
                        </li>
                        <li>
                            <a :class="{'icon-gray-jibaru': post.commentsCount == 0, 'icon-blue-jibaru': post.commentsCount > 0}"
                               href="javascript:void(0);">
                                <i class="ion-chatbubble"></i>{{post.commentsCount}}
                            </a>
                        </li>
                        <li><a :class="{'icon-gray-jibaru': !post.viewed, 'icon-blue-jibaru': post.viewed}"
                               href="javascript:void(0);">
                            <i class="ion-eye"></i>{{post.viewsCount}}</a>
                        </li>
                    </ul>

                    <ul class="icons">
                        <li>COMPARTIR : </li>
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                    </ul>
                </div>

                <div class="post-footer post-info">

                    <div class="left-area">
                        <a class="avatar" href="#"><img :src="post.user.file.url" alt="Profile Image"></a>
                    </div>

                    <div class="middle-area">
                        <a class="name" href="#"><b>{{post.user.name}}</b></a>
                        <h6 class="date">{{post.dateTime}}</h6>
                    </div>

                </div>

            </div>

        </div>

    </div>

</template>

<script>

    export default {
        name: 'CenteredPost',
        props: {
            post: {
                type: Object
            },
        },
        data(){
            return {
                user: {
                    id: undefined
                }
            }
        },
        methods: {
            async createLike(){
                console.log('leik');
            },
            async createView(postId){
                try {

                    const body = {};

                    body.post_id = postId;
                    body.user_id = this.user.id;

                    const response = await axios.post('/posts-views', body);

                    console.log(response);
                }catch(e){
                    console.log(e);
                }
            },
            async getAuth(){
                try {
                    const response = await axios.get('/auth');

                    console.log(response);

                    if(response.status === 200){
                        if(response.data !== '' && response.data !== undefined){
                            this.user.id = response.data.id;
                        } else {
                            this.user.id = undefined;
                        }
                    }

                }catch(e){
                    console.log(e);
                }
            },
        },
        mounted(){
            this.getAuth().then((_) => {
                if(!this.post.viewed && this.user.id !== undefined){
                    this.createView(this.post.id);
                }
            });
        }
    }

</script>
