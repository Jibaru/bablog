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
                        <router-view></router-view>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <sidebar></sidebar>
                    </div>
                </div>

                <a class="load-more-btn" href="#"><b>CARGAR MÁS</b></a>

            </div>
        </section>
    </div>

</template>

<script>

    import Sidebar from '../../components/Sidebar';

    export default {
        props: {
            category: {
                type: String,
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

            }
        }
    }

</script>
