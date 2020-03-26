<template>

    <div>
        <sidebar-post
            v-if="post.type === 'SIDEBAR'"
            :post="post"
            @on-create-like="increaseLikes"
            @on-delete-like="decreaseLikes"
            @on-create-view="increaseViews">
        </sidebar-post>
        <centered-post
            v-if="post.type === 'CENTERED'"
            :post="post"
            @on-create-like="increaseLikes"
            @on-delete-like="decreaseLikes"
            @on-create-view="increaseViews">
        </centered-post>
        <landing-post
            v-if="post.type === 'LANDING'"
            :post="post"
            @on-create-like="increaseLikes"
            @on-delete-like="decreaseLikes"
            @on-create-view="increaseViews">
        </landing-post>
    </div>

</template>

<script>

    import SidebarPost from './SidebarPost';
    import CenteredPost from './CenteredPost';
    import LandingPost from './LandingPost';
    import Transformers from '../../../utils/transformers';

    export default {
        components: {
            'sidebar-post': SidebarPost,
            'centered-post': CenteredPost,
            'landing-post': LandingPost
        },
        props: {
            id: {
                type: String | Number,
            }
        },
        data(){
            return {
                post: {
                    id: undefined,
                    title: '',
                    dateTime: '',
                    type: '',
                    cardType: '',
                    description: '',
                    content: '',
                    commentsCount: 0,
                    likesCount: 0,
                    viewsCount: 0,
                    viewed: false,
                    liked: false,
                    user: {
                        id: undefined,
                        name: '',
                        email: '',
                        file: {
                            id: undefined,
                            name: '',
                            format: '',
                            path: '',
                            type: '',
                            url: ''
                        },
                        role: {
                            id: '',
                            name: '',
                            permission: ''
                        }
                    },
                    category: {
                        id: undefined,
                        name: ''
                    },
                    comments: [],
                    likes: [],
                    views: [],
                    file: {
                        id: undefined,
                        name: '',
                        format: '',
                        path: '',
                        type: '',
                        url: ''
                    }
                }
            }
        },
        methods: {
            increaseLikes(e){
                this.post.liked = true;
                this.post.likesCount += 1;
                console.log( 'like increase:',this.post.liked);
            },
            decreaseLikes(e){
                this.post.liked = false;
                this.post.likesCount -= 1;
                console.log( 'like decrese:',this.post.liked);
            },
            increaseViews(e){
                this.post.viewed = true;
                this.post.viewsCount += 1;
            },
            async getPost(id){
                try {

                    const response = await axios.get(`posts/${id}`);

                    if(response.status === 200){
                        const data = Transformers.keysToCamel(response.data);
                        Transformers.massiveAssignment(data, this.post);
                        this.$emit('on-loaded', data);
                    }

                } catch(e) {
                    console.log(e);
                }
            }
        },
        mounted(){
            this.getPost(this.id);
        }
    }

</script>
