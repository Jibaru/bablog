<template>
    <div>
        <div class="slider"></div>
        <section class="blog-area section">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8 colmd-12">
                        <list-post route="posts"></list-post>
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

    import PostCard from '../../components/PostCard';
    import BigPostCard from '../../components/BigPostCard';
    import TinyPostCard from '../../components/TinyPostCard';
    import Sidebar from '../../components/Sidebar';
    import ListPost from '../posts/ListPost';

    export default {
        components: {
            'post-card': PostCard,
            'big-post-card': BigPostCard,
            'tiny-post-card': TinyPostCard,
            'sidebar': Sidebar,
            'list-post': ListPost
        }
    }
</script>
