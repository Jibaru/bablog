<template>

    <div>
        <div class="row">

            <div v-for="(post, i) in posts"
                 :key="i"
                 class="col-md-6">
                <post-card :to="`${route}/${post}`"></post-card>
            </div>

        </div>
    </div>

</template>

<script>

    import PostCard from '../../components/PostCard';
    import BigPostCard from '../../components/BigPostCard';
    import TinyPostCard from '../../components/TinyPostCard';

    export default {
        components: {
            'post-card': PostCard,
            'big-post-card': BigPostCard,
            'tiny-post-card': TinyPostCard,
        },
        props: {
            route: {
                type: String,
                default: '/'
            }
        },
        data(){
            return {
                posts: [1,2,3,4,5,6,7,8]
            }
        }
    }

</script>
