<template>

    <div>
        <sidebar-post
            v-if="post.type === 'SIDEBAR'"
            :post="post">
        </sidebar-post>
        <centered-post
            v-if="post.type === 'CENTERED'"
            :post="post">
        </centered-post>
        <landing-post
            v-if="post.type === 'LANDING'"
            :post="post">
        </landing-post>
    </div>

</template>

<script>

    import SidebarPost from './SidebarPost';
    import CenteredPost from './CenteredPost';
    import LandingPost from './LandingPost';
    import Transformers from '../../utils/transformers';

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
                        email: ''
                    },
                    category: {
                        id: undefined,
                        name: ''
                    },
                    comments: [],
                    likes: [],
                    views: [],
                    frontImage: {
                        id: undefined,
                        file: {
                            id: undefined,
                            name: '',
                            format: '',
                            path: '',
                            type: '',
                            url: ''
                        }
                    },
                }
            }
        },
        methods: {
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
