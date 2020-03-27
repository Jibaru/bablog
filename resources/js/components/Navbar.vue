<template>

    <div>
        <header>
            <div class="container-fluid position-relative no-side-padding">

                <a href="/#/" class="logo"><img src="images/logo.png" alt="Logo Image"></a>

                <div v-if="user.id" class="user-avatar-navbar" @click="displayUserMenu = !displayUserMenu">
                    <a href="#" class="avatar" >
                        <img :src="user.file.url" alt="Profile Image">
                    </a>
                </div>
                <div v-else class="user-login-navbar">
                    <a href="/#/login" class="avatar" >
                        Iniciar Sesión
                    </a>
                </div>

                <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

                <ul class="main-menu visible-on-click" id="main-menu">
                    <li><a href="/">Inicio</a></li>
                    <!--<li><a href="#">Categorías</a>
                        <ul class="submenu">
                            <li><router-link to="/tecnologia">Tecnología</router-link></li>
                            <li><router-link to="/desarrollo">Desarrollo</router-link></li>
                            <li><router-link to="/aprendizaje">Aprendizaje</router-link></li>
                        </ul>

                    </li>-->
                    <li><router-link to="/tecnologia">Tecnología</router-link></li>
                    <li><router-link to="/desarrollo">Desarrollo</router-link></li>
                    <li><router-link to="/aprendizaje">Aprendizaje</router-link></li>
                    <!--<li><a href="#">Otros</a></li>-->
                </ul>


                <!--<div class="src-area">
                    <form>
                        <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                        <input class="src-input" type="text" placeholder="Escribe para buscar">
                    </form>
                </div>-->
            </div>

        </header>
        <transition name="slide-fade">
            <div id="menu-user-navbar"
                 class="card pr-3 pl-3 pb-2 pt-3"
                 v-if="displayUserMenu">
                <div class="text-right">
                    <span style="cursor: pointer" @click="displayUserMenu = false;">X</span>
                </div>
                <ul class="list-group" style="font-size: 15px">
                    <li class="p-3">
                        <div class="row">
                            <div class="col-3">
                                <i class="icon ion-log-out"></i>
                            </div>
                            <div class="col-9 pt-2" style="border-bottom: solid 2px black">
                                <a href="#" @click="logout">Cerrar Sesión</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </transition>
        <transition name="slide-right-fade">
            <div v-if="displayUserMenu" class="backdrop-navbar"></div>
        </transition>
    </div>

</template>

<script>

    export default {
        name: 'Navbar',
        data(){
            return {
                user: {
                    id: undefined,
                    name: '',
                    email: '',
                    file: {
                        url: ''
                    }
                },
                displayUserMenu: false
            }
        },
        methods: {
            async getAuth(){
                try {
                    const response = await axios.get('/auth');

                    if(response.status === 200){
                        if(response.data !== '' && response.data !== undefined){
                            this.user.id = response.data.id;
                            this.user.name = response.data.name;
                            this.user.email = response.data.email;
                            this.user.file.url = response.data.file.url;
                        }
                    }

                }catch(e){
                    console.log(e);
                }
            },
            async logout(){
                try {
                    const response = await axios.get('/logout');

                    if(response.status === 200){
                        this.displayUserMenu = false;
                        this.clearUser();
                    }

                }catch(e){
                    console.log(e);
                }
            },
            clearUser(){
                this.user.id = undefined;
                this.user.name = '';
                this.user.email = '';
                this.user.file.url = '';
            }

        },
        mounted(){
            this.getAuth();


        },
        created(){
            window.eventBus.$on('on-login', function (data) {
                this.getAuth();
            }.bind(this));
        }

    }

</script>
<style>
    #main-menu{
        margin-bottom: 0;
    }
    header {
        position: fixed;
        width: 100%;
        z-index: 999;
    }

    .user-avatar-navbar {
        width: 50px;
        height: 50px;
        background-color: #656776;
        border: 5px solid #fff;
        border-radius: 50%;
        box-shadow: 0px 0px 10px rgba(0,0,0,.1);
        margin-top: 4px;
        float: right;
        overflow: hidden;
    }

    .user-login-navbar{
        width: 100px;
        height: 50px;
        padding-top: 20px;
        float: right;
    }

    #menu-user-navbar {
        width: 100%;
        max-width: 300px;
        height: 100%;
        position: fixed;
        top: 0;
        right: 0;
        z-index:  1001;
    }

    .backdrop-navbar {
        width: 100%;
        height: 100%;
        position: fixed;
        background-color: rgba(0,0,0,0.5);
        top: 0;
        right: 0;
        z-index:  1000;
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

    @media only screen and (max-width: 767px) {
        .user-avatar-navbar {
            margin-right: 40px;
        }

        .user-login-navbar {
            margin-right: 40px;
        }
    }
</style>
