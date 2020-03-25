<template>
    <div>
        <div class="slider"></div>
        <section class="blog-area section">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8 colmd-12">
                        <list-post route="posts" @on-loaded="checkPosts"></list-post>
                        <a v-if="hasPosts" class="load-more-btn" href="#"><b>CARGAR MÁS</b></a>
                        <div v-if="!hasPosts" class="text-center card pt-3 pb-3" ><b>Sin posts en esta categoría</b></div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <sidebar></sidebar>
                    </div>
                </div>

            </div>
        </section>
    </div>
</template>
<script>

    import Sidebar from '../../../components/Sidebar';
    import ListPost from '../posts/ListPost';

    export default {
        components: {
            'sidebar': Sidebar,
            'list-post': ListPost
        },
        data(){
            return {
                hasPosts: false
            }
        },
        methods: {
            checkPosts(posts){
                if(posts.length > 0){
                    this.hasPosts = true;
                    console.log('hasPosts', this.hasPosts);
                } else{
                    this.hasPosts = false;
                }
            }
        },
    }
</script>
