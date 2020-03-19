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
                                <h5 class="pre-title">FASHION</h5>

                                <h3 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex Concepts in Physics?</b></a></h3>

                                <div class="post-info">

                                    <div class="left-area">
                                        <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg" alt="Profile Image"></a>
                                    </div>

                                    <div class="middle-area">
                                        <a class="name" href="#"><b>Katy Liu</b></a>
                                        <h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
                                    </div>

                                </div><!-- post-info -->

                            </div><!-- display-table-cell -->
                        </div><!-- display-table -->

                    </div><!-- col-lg-10 -->
                </div>
            </div>
        </div>
        <section
            :class="{
                'post-area-sidebar section': currentType === 'SIDEBAR',
                'post-area-centered': currentType === 'CENTERED',
                'post-area-landing': currentType === 'LANDING',
            }">
            <div v-if="currentType === 'LANDING'">
                <div class="container">
                    <div class="row">

                        <div class="col-md-1"></div>
                        <div class="col-md-10">

                            <div class="main-post-landing">

                                <div class="post-top-area">

                                    <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                        nulla pariatur. Excepteur sint
                                        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

                                </div><!-- post-top-area -->

                            </div><!-- main-post -->
                        </div><!-- col-lg-8 -->

                    </div><!-- row -->
                </div><!-- container -->

                <div class="post-image"><img src="images/blog-1-1000x600.jpg" alt="Blog Image"></div>

            </div>

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
    </div>

</template>

<script>

    import Sidebar from '../../components/Sidebar';
    import SelectorPost from '../posts/SelectorPost';

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
            'selector-post': SelectorPost
        },
        data(){
            return {
                currentType: ''
            }
        },
        methods: {
            updateView(type){
                this.currentType = type;
            }
        },
        mounted(){

        }
    }

</script>
