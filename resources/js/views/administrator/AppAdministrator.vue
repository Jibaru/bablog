<template>

    <div>
        <navbar-administrator @on-click-icon="showMenu = true;"></navbar-administrator>
        <transition name="slide-fade">
            <div v-if="showMenu"
                 id="menu-side-administrador"
                 class="pt-5 pl-3 pb-5" >
                <router-link v-for="(menuItem, i) in listMenu"
                     :key="i"
                    class="row w-100 pt-2 pb-2"
                    :to="menuItem.path"
                    style="font-size: 17px;
                    background-color: #F3F1F0;
                    margin-bottom: 10px;
                    border-right: solid 2px blue">
                    <div class="col-2">
                        <i :class="menuItem.icon"></i>
                    </div>
                    <div class="col-10" >
                        {{menuItem.name}}
                    </div>
                </router-link>
            </div>
        </transition>
        <transition name="slide-fade">
        <div v-if="showMenu"
             class="fadedrop-side-administrador"
            @click="showMenu = false;">
        </div>
        </transition>
    </div>

</template>

<script>

    export default {
        data(){
            return {
                showMenu: false,
                listMenu: [
                    {
                        name: 'Roles',
                        icon: 'icon ion-settings',
                        path: '/roles'
                    },
                    {
                        name: 'Usuarios',
                        icon: 'icon ion-settings',
                        path: '/usuarios'
                    },
                    {
                        name: 'Posts',
                        icon: 'icon ion-settings',
                        path: '/posts'
                    },
                    {
                        name: 'Archivos',
                        icon: 'icon ion-settings',
                        path: '/archivos'
                    },

                ]
            }
        }
    }

</script>

<style>

    #menu-side-administrador {
        width: 300px;
        height: 100%;
        top: 0;
        position: fixed;
        background-color: white;
        border-left: solid 10px midnightblue;
        box-sizing: border-box;
        overflow-y: scroll;
        z-index: 999;
    }

    .fadedrop-side-administrador {
        width: 100%;
        height: 100%;
        top: 0;
        position: fixed;
        z-index: 997;
        background-color: rgba(0,0,0,0.2);
    }

    .slide-fade-enter-active {
        transition: all .3s ease;
    }
    .slide-fade-leave-active {
        transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }

    .slide-right-fade-enter-active {
        transition: all .3s ease;
    }

    .slide-right-fade-leave-active {
        transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }

    .slide-right-fade-enter, .slide-right-fade-leave-to
        /* .slide-fade-leave-active below version 2.1.8 */ {
        transform: translateX(-10px);
        opacity: 0;
    }

    .slide-fade-enter, .slide-fade-leave-to
        /* .slide-fade-leave-active below version 2.1.8 */ {
        transform: translateX(10px);
        opacity: 0;
    }

</style>
