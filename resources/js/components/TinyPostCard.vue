<template>
    
    <div>
        <div class="card h-100">
            <div class="single-post post-style-4 mb-0">

                <div class="display-table">
                    <h4 class="title display-table-cell">
                        <router-link :to="to">
                            <b>{{post.title}}</b>
                        </router-link>
                    </h4>
                </div>

                <ul class="post-footer">
                    <li><a href="#"><i class="ion-heart"></i>{{post.likesCount}}</a></li>
                    <li><a href="#"><i class="ion-chatbubble"></i>{{post.commentsCount}}</a></li>
                    <li><a href="#"><i class="ion-eye"></i>{{post.viewsCount}}</a></li>
                </ul>

            </div>

        </div>
    </div>

</template>

<script>
    export default {
        name: 'TinyPostCard',
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
