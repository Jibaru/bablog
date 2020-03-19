<template>

    <div>
        <div class="row">

            <div v-for="(post, i) in posts"
                 :key="i"
                 class="col-md-6">
                <post-card :to="`${route}/${post.id}`" :post="post"></post-card>
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
                posts: [],
                counterPage: 1
            }
        },
        methods: {
            async getPostPerPage(page){
                try {
                    const response = await axios.get(`front-posts?page=${page}`);
                    console.log(response);
                    if(response.status == 200){
                        return response.data.data;
                    }

                } catch(e) {
                    return [];
                }
            },
            async appendPosts(){
                const paginatedPosts = await this.getPostPerPage(this.counterPage);
                this.posts = this.posts.concat(paginatedPosts);
                this.counterPage++;
            }
        },
        mounted(){
            this.appendPosts(this.counterPage);
        }
    }

</script>
