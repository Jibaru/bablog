<template>
    <ul class="post-icons">
        <li>
            <a :class="{'icon-gray-jibaru': !post.liked, 'icon-blue-jibaru': post.liked, }"
               href="javascript:void(0);"
               @click="!post.liked ? createLike(post.id) : deleteLike(post.id)">
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
</template>
<script>

    export default {
        props: {
            post: {
                type: Object
            },
            user:{
                type: Object
            }
        },
        data(){
            return {
                localLike: false
            }
        },
        methods: {
            async deleteLike(postId){
                try {

                    const body = {};

                    body.post_id = postId;
                    body.user_id = this.user.id;

                    const response = await axios.post('/delete-likes-by-post-user', body);

                    if(response.status === 200){
                        this.$emit('on-delete-like', response.data);
                    }
                }catch(e){
                    console.log(e);
                }
            },
            async createLike(postId){
                try {

                    const body = {};

                    body.post_id = postId;
                    body.user_id = this.user.id;

                    const response = await axios.post('/posts-likes', body);

                    if(response.status === 201){
                        this.$emit('on-create-like', response.data);
                    }
                }catch(e){
                    console.log(e);
                }
            },
            async createView(postId){
                try {

                    const body = {};

                    body.post_id = postId;
                    body.user_id = this.user.id;

                    const response = await axios.post('/posts-views', body);

                    if(response.status === 201){
                        this.$emit('on-create-view', response.data);
                    }

                }catch(e){
                    console.log(e);
                }
            },
        }
    }
</script>
