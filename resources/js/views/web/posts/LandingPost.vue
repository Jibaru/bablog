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
                    <icon-information-bar
                        ref="icon-information-bar"
                        :post="post"
                        :user="user"
                        @on-create-like="$emit('on-create-like')"
                        @on-delete-like="$emit('on-delete-like')"
                        @on-create-view="$emit('on-create-view')">
                    </icon-information-bar>

                    <share-bar></share-bar>
                </div>

                <div class="post-footer post-info">

                    <div class="left-area">
                        <a class="avatar" href="#"><img :src="post.user.file.url" alt="Profile Image"></a>
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

    import ShareBar from './ShareBar';
    import IconInformationBar from './IconInformationBar';

    export default {
        name: 'LandingPost',
        components: {
            'share-bar': ShareBar,
            'icon-information-bar': IconInformationBar
        },
        props: {
            post: {
                type: Object
            }
        },
        data(){
            return {
                user: {
                    id: undefined
                }
            }
        },
        methods: {
            async getAuth(){
                try {
                    const response = await axios.get('/auth');

                    console.log(response);

                    if(response.status === 200){
                        if(response.data !== '' && response.data !== undefined){
                            this.user.id = response.data.id;
                        } else {
                            this.user.id = undefined;
                        }
                    }

                }catch(e){
                    console.log(e);
                }
            },
        },
        mounted(){
            this.getAuth().then((_) => {
                if(!this.post.viewed && this.user.id !== undefined){
                    this.$refs['icon-information-bar'].createView(this.post.id);
                }
            });
        }
    }

</script>
