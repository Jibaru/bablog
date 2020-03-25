<template>

    <div>
        <div class="row">
            <div v-for="(post, i) in posts"
                 :key="i"
                 :class="{
                    'col-md-6': post.cardType === 'NORMAL' || post.cardType === 'TINY',
                    'col-md-12': post.cardType === 'BIG',
                 }">
                <post-card
                    v-if="post.cardType === 'NORMAL'"
                    :to="`${route}/${post.id}`"
                    :post="post">
                </post-card>
                <tiny-post-card
                    v-if="post.cardType === 'TINY'"
                    :to="`${route}/${post.id}`"
                    :post="post">
                </tiny-post-card>
                <big-post-card
                    v-if="post.cardType === 'BIG'"
                    :to="`${route}/${post.id}`"
                    :post="post">
                </big-post-card>
            </div>
        </div>
    </div>

</template>

<script>

    import PostCard from '../../../components/PostCard';
    import BigPostCard from '../../../components/BigPostCard';
    import TinyPostCard from '../../../components/TinyPostCard';
    import Transformers from '../../../utils/transformers';

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
            },
            category: {
                type: String,
            }
        },
        data(){
            return {
                posts: [],
                counterPage: 1
            }
        },
        methods: {
            async getPostPerPage(page, category){
                try {

                    const response = await axios.get(`front-posts?page=${page}&category_id=${category || ''}`);

                    if(response.status == 200){
                        return Transformers.keysToCamel(response.data.data);
                    }

                } catch(e) {
                    console.log(e);
                    return [];
                }
            },
            async appendPosts(){
                const paginatedPosts = await this.getPostPerPage(this.counterPage, this.category);
                this.posts = this.posts.concat(paginatedPosts);
                this.$emit('on-loaded', [...this.posts]);
            }
        },
        mounted(){
            this.appendPosts();
        },
        watch: {
            '$route' (to, from) {
                this.posts = [];
                this.appendPosts();
            }
        }
    }

</script>
