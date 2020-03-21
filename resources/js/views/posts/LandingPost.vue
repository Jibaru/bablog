<template>

    <div>
        <div class="main-post-landing">

            <div class="post-bottom-area">

                <div v-html="post.content"></div>

                <ul class="tags">
                    <li><a href="#">Informática</a></li>
                    <li><a href="#">Programación</a></li>
                    <li><a href="#">Otros</a></li>
                    <li><a href="#">Gaaa</a></li>
                </ul>

                <div class="post-icons-area">
                    <ul class="post-icons">
                        <li>
                            <a :class="{'icon-gray-jibaru': !post.liked, 'icon-blue-jibaru': post.liked}" href="#">
                                <i class="ion-heart"></i>{{post.likesCount}}
                            </a>
                        </li>
                        <li>
                            <a :class="{'icon-gray-jibaru': post.commentsCount == 0, 'icon-blue-jibaru': post.commentsCount > 0}" href="#">
                                <i class="ion-chatbubble"></i>{{post.commentsCount}}
                            </a>
                        </li>
                        <li><a :class="{'icon-gray-jibaru': !post.viewed, 'icon-blue-jibaru': post.viewed}" href="#">
                            <i class="ion-eye"></i>{{post.viewsCount}}</a>
                        </li>
                    </ul>

                    <ul class="icons">
                        <li>COMPARTIR: </li>
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                    </ul>
                </div>

                <div class="post-footer post-info">

                    <div class="left-area">
                        <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg" alt="Profile Image"></a>
                    </div>

                    <div class="middle-area">
                        <a class="name" href="#"><b>{{post.user.name}}</b></a>
                        <h6 class="date">{{post.dateTime}}</h6>
                    </div>

                </div>

            </div>

        </div>
    </div>

</template>

<script>

    export default {
        name: 'LandingPost',
        props: {
            post: {
                type: Object
            }
        }
    }

</script>
