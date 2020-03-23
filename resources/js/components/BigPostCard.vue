<template>
    <div>
        <div class="card h-100">
            <div v-if="post" class="single-post post-style-2">

                <div class="blog-image"><img :src="post.frontImage.file.url" alt="Blog Image"></div>

                <div class="blog-info">

                    <h6 class="pre-title">
                        <a href="#">
                            <b>{{post.category.name}}</b>
                        </a>
                    </h6>

                    <h4 class="title">
                        <router-link :to="to">
                            <b>{{post.title}}</b>
                        </router-link>
                    </h4>

                    <p>{{post.description}}</p>

                    <div class="avatar-area">
                        <a class="avatar" href="#"><img :src="post.user.file.url" alt="Profile Image"></a>
                        <div class="right-area">
                            <a class="name" href="#"><b>{{post.user.name}}</b></a>
                            <h6 class="date" href="#">{{post.dateTime}}</h6>
                        </div>
                    </div>

                    <ul class="post-footer">
                        <li><a href="#"><i class="ion-heart"></i>{{post.likesCount}}</a></li>
                        <li><a href="#"><i class="ion-chatbubble"></i>{{post.commentsCount}}</a></li>
                        <li><a href="#"><i class="ion-eye"></i>{{post.viewsCount}}</a></li>
                    </ul>

                </div>

            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: 'BigPostCard',
        props: {
            to: {
                type: String,
                default: '#'
            },
            post: {
                type: Object
            }
        }
    }
</script>
