<template>
    <div class="menu">
        <div id="icon-menu" >
            <i class="fas fa-bars"></i>
            <!--<figure>
                <img src="images/FINANCELOGO.png"/>
            </figure>-->
        </div>
        <div id="menu-app">
            <div class="menu-header close-block">
                <figure>
                    <img src="images/logo.png" style="width: 180px;"/>
                </figure>
                <div class="back-home">
                    <i class="fas fa-angle-double-left"></i>
                </div>
            </div>
            <ul class="list-items">
                <li v-for="(item, index) in listmenu" :class="item.borde"  :data-url="item.modal" :key="index">
                    <div class="items" data-toggle="collapse" :data-target="`#menu-nav-${index}`">
                        <div class="icon-item ">
                            <i :class="item.icon"></i>
                        </div>
                        <div class="conte-item">
                            {{item.title}}
                        </div>
                    </div>
                    <div :id="`menu-nav-${index}`" class="collapse" style>
                        <div v-for="(nested, indexNested) in item.nested"
                             :key="indexNested"
                             class="ml-3">
                            <router-link
                                :to="(item.link != '/') ? item.link + nested.link : nested.link"
                                class="items close-app-menu"
                                :data-collapsible="`#menu-nav-${index}`">
                                <div class="icon-item anime">
                                    <i :class="nested.icon"></i>
                                </div>
                                <div class="conte-item anime">
                                    {{nested.title}}
                                </div>
                            </router-link>
                        </div>
                    </div>
                    <!--<router-link :to="item.link" class="items">
                        <div class="icon-item anime">
                            <i :class="item.icon"></i>
                        </div>
                        <div class="conte-item anime">
                            {{item.title}}
                        </div>
                    </router-link>-->
                </li>
            </ul>
        </div>
        <div id="bloqueo-view" class="close-block"></div>
    </div>
</template>
<script>
    import {TweenLite, Power2, TimelineLite} from "gsap";

    export default {
        props: {
            'listmenu': {type: Array}
        },
        data() {
            return {}
        },
        mounted() {
            var overskull = overskull || {};

            overskull.menuapp = {
                domain: 'http://165.22.148.198/',
                open() {
                    TweenLite.to($('#icon-menu'), .5, {left: -30, ease: Power2.easeIn});
                    TweenLite.to($('#menu-app'), .5, {left: 0, ease: Power2.easeIn});
                    $('#bloqueo-view').fadeIn();
                },
                close() {
                    TweenLite.to($('#menu-app'), .5, {
                        left: -320, ease: Power2.easeIn, onComplete: function () {
                            $('#bloqueo-view').fadeOut();
                            TweenLite.to($('#icon-menu'), .5, {left: 20});
                        }
                    });
                },
                animation(elements) {
                    TweenLite.to($('#principal-content'), .5, {
                        top: -300,
                        alpha: 0,
                        ease: Back.easeInOut,
                        onComplete: overskull.menuapp.salida({
                            url: elements.selector
                        })
                    });
                },
                salida(elements) {
                    $('.preloader').fadeIn('fast');

                    var nameUrl = overskull.menuapp.domain + elements.url;

                    /*
                    $.ajax({
                        url: nameUrl,
                        beforeSend: function beforeSend() {
                        },
                        success: function success(result) {
                            $('#page-content').html(result);
                        },
                        complete: function complete() {
                            $('.preloader').fadeOut(function () {
                                TweenLite.to($('#principal-content'), .5, {
                                    top: 0,
                                    alpha: 1,
                                    ease: Back.easeInOut,
                                    onComplete: function onComplete() {
                                        $('.preloader').css({
                                            'opacity': 1,
                                            'display': 'none'
                                        });
                                    }
                                });
                            });
                        }
                    });
                    */
                }
            }

            $('.close-app-menu').on('click', function (e) {
                overskull.menuapp.close();
                var base = $(this);

                let idCollapsible = base.data('collapsible');

                $(idCollapsible).collapse('hide');

                if ($(this).data('url')) {
                    $('#modal-red').fadeIn(function () {
                        overskull.menuapp.animation({
                            selector: base.data('url')
                        });
                    });
                } else {
                    $('#modal-red').fadeOut();
                }

            });
            $('#icon-menu').on('click', function (e) {
                e.preventDefault();
                overskull.menuapp.open();
            });
            $('.close-block').on('click', function (e) {
                e.preventDefault();
                overskull.menuapp.close();
            });

        },
        methods: {

        }
    }
</script>
<style>


</style>
