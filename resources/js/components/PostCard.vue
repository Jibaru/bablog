<template>
    <div>
        <div class="card h-100">
            <div class="single-post post-style-1">

                <div v-if="post.frontImage" class="blog-image"><img :src="post.frontImage.file.url" alt="Blog Image"></div>

                <a class="avatar" href="#"><img src="images/icons8-team-355979.jpg" alt="Profile Image"></a>

                <div class="blog-info">

                    <h4 class="title">
                        <router-link :to="to">
                            <b>{{post.title}}</b>
                        </router-link>
                    </h4>

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
        name: 'PostCard',
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
