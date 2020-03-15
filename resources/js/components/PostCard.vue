<template>
    <div>
        <div class="card h-100">
            <div class="single-post post-style-1">

                <div class="blog-image"><img src="images/marion-michele-330691.jpg" alt="Blog Image"></div>

                <a class="avatar" href="#"><img src="images/icons8-team-355979.jpg" alt="Profile Image"></a>

                <div class="blog-info">

                    <h4 class="title">
                        <router-link :to="to">
                            <b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex Concepts in Physics?</b>
                        </router-link>
                    </h4>

                    <ul class="post-footer">
                        <li><a href="#"><i class="ion-heart"></i>57</a></li>
                        <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                        <li><a href="#"><i class="ion-eye"></i>138</a></li>
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
            }
        }

    }
</script>
