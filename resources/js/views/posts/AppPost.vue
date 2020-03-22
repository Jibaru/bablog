<template>

    <div>
        <div :class="{
            'slider-centered': currentType === 'CENTERED',
            'slider-landing': currentType === 'LANDING',
            'slider': currentType === 'SIDEBAR',
            }">
           <div v-if="currentType !== 'LANDING'"
               :class="{
                'display-table center-text': currentType === 'SIDEBAR',
            }">
               <h1 v-if="currentType === 'SIDEBAR'"
                   class="title display-table-cell"><b>{{title}}</b></h1>
           </div>
            <div v-if="currentType === 'LANDING'"
                 class="container height-100 text-center text-white">
                <div class="row height-100">

                    <div class="col-lg-1 hidden-md-down"></div>

                    <div class="col-lg-10 col-md-12">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <h5 class="pre-title">{{currentPost.category.name}}</h5>

                                <h3 class="title">
                                    <a href="#">
                                        <b>{{currentPost.title}}</b>
                                    </a>
                                </h3>

                                <div class="post-info">

                                    <div class="left-area">
                                        <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg" alt="Profile Image"></a>
                                    </div>

                                    <div class="middle-area">
                                        <a class="name" href="#"><b>{{currentPost.user.name}}</b></a>
                                        <h6 class="date">{{currentPost.dateTime}}</h6>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <section
            :class="{
                'post-area-sidebar section': currentType === 'SIDEBAR',
                'post-area-centered': currentType === 'CENTERED',
                'post-area-landing': currentType === 'LANDING',
            }">

            <div class="container">

                <div class="row">
                    <div
                        v-if="currentType !== 'SIDEBAR'"
                        :class="{
                            'col-lg-1 col-md-0': currentType === 'CENTERED',
                            'col-md-1': currentType === 'LANDING'
                    }">
                    </div>
                    <div :class="{
                        'col-lg-8 col-md-12': currentType === 'SIDEBAR',
                        'col-lg-10 col-md-12': currentType === 'CENTERED',
                        'col-md-10': currentType === 'LANDING'
                    }">
                        <selector-post
                            :id="this.id"
                            @on-loaded="updateView">
                        </selector-post>
                    </div>
                    <div
                        v-if="currentType === 'SIDEBAR'"
                        class="col-lg-4 col-md-12">
                        <sidebar from="POST"></sidebar>
                    </div>
                </div>

            </div>
        </section>
        <recommend-section></recommend-section>
        <comment-section
            :post="currentPost"
            @on-comment="updateView">
        </comment-section>
    </div>

</template>

<script>

    import Sidebar from '../../components/Sidebar';
    import SelectorPost from '../posts/SelectorPost';
    import CommentSection from '../../components/CommentSection';
    import RecommendSection from '../../components/RecommendSection';
    import Transformers from '../../utils/transformers';

    export default {
        props: {
            title: {
                type: String
            },
            id: {
                type: String | Number,
            }
        },
        components: {
            'sidebar': Sidebar,
            'selector-post': SelectorPost,
            'comment-section': CommentSection,
            'recommend-section': RecommendSection,
        },
        data(){
            return {
                currentType: '',
                currentPost: {
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
            updateView(post){
                this.currentType = post.type;
                Transformers.massiveAssignment(post, this.currentPost);
                console.log('aja', post);
            }
        },
        mounted(){

        }
    }

</script>
