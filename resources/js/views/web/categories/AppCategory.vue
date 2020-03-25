<template>

    <div>
        <div class="slider display-table center-text">
            <h1 class="title display-table-cell"><b>{{title}}</b></h1>
        </div>
        <section
            :class="{
                'blog-area': !$route.path.includes('/posts/'),
                'post-area': $route.path.includes('/posts/'),
                'section': true, }">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8 colmd-12">
                        <router-view @on-loaded="checkPosts"></router-view>
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

    export default {
        props: {
            category: {
                type: String | Number,
            },
            title: {
                type: String
            }
        },
        components: {
            'sidebar': Sidebar
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
