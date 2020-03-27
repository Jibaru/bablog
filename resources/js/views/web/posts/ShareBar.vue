<template>
    <div>
        <ul class="icons">
            <li>COMPARTIR : </li>
            <li>
                <a :href="facebookUrl"
                   class="fb-xfbml-parse-ignore"
                   @click.prevent="openWindow(facebookUrl)">
                    <i class="ion-social-facebook"></i>
                </a>
            </li>
            <li>
                <a :href="twitterUrl"
                    @click.prevent="openWindow(twitterUrl)">
                    <i class="ion-social-twitter"></i>
                </a>
            </li>
            <!--<li><a href="#"><i class="ion-social-pinterest"></i></a></li>-->
        </ul>
    </div>

</template>
<script>

    export default {
        props: {
            to: {
                type: String,
                default: 'http://127.0.0.1:8000/#/posts/3'
            }
        },
        methods: {
            openWindow(url){

                let y = window.outerHeight / 2 + window.screenY - ( 600 / 2);
                let x = window.outerWidth / 2 + window.screenX - ( 800 / 2);

                window.open(
                    url,
                    'Compartir',
                    `width=800,height=600,top=${y},left=${x}`,
                );
                return false;
            }
        },
        computed: {
            facebookUrl(){
                return `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(this.to)}&amp;src=sdkpreparse`
            },
            twitterUrl(){
                return `http://twitter.com/home?status=${encodeURIComponent(this.to)}`;
            }
        }
    }

</script>
