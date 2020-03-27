<template>

    <div class="container pt-5">

        <div class="comment-form row">
            <div class="col-md-6">
                AQUÍ IRÁ EL LOGO
            </div>
            <transition name="fade" mode="out-in" appear>
                <div v-if="!register" 
                    key="login"
                    class="col-md-6">
                    <h4 class="pt-5">
                        <b>INICIAR SESIÓN</b>
                    </h4>
                    <form method="post" @submit.prevent="loginUser">
                        <div>
                            <input 
                                v-model="userLogin.email"
                                type="email" 
                                aria-required="true" 
                                name="contact-form-name" 
                                class="form-control"
                                placeholder="Email" 
                                aria-invalid="true" 
                                required >
                        </div>
                        <div>
                            <input 
                                v-model="userLogin.password"
                                type="password" 
                                aria-required="true" 
                                name="contact-form-email" 
                                class="form-control"
                                placeholder="Contraseña" 
                                aria-invalid="true" 
                                required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-1">
                                <button class="submit-btn btn-block" type="submit">
                                    <b v-if="!isLoadingLogin">INGRESAR</b>
                                    <b v-if="isLoadingLogin">CARGANDO...</b>
                                </button>
                            </div>
                            <div class="col-md-6 mt-1">
                                <button @click="register = true"
                                        class="submit-btn btn-block"
                                        type="button">
                                    <b>¿Eres nuevo? REGÍSTRATE</b>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            
                <div v-else 
                    class="col-md-6"
                    key="register">
                    <h4 class="pt-5">
                        <b>REGISTRARSE</b>
                    </h4>
                    <form method="post" @submit.prevent="createUser">
                        <div>
                            <input 
                                v-model="userRegister.name"
                                type="text" 
                                aria-required="true" 
                                name="contact-form-name" 
                                class="form-control"
                                placeholder="Nombre" 
                                aria-invalid="true" 
                                required >
                        </div>
                        <div>
                            <input 
                                v-model="userRegister.email"
                                type="email" 
                                aria-required="true" 
                                name="contact-form-name" 
                                class="form-control"
                                placeholder="Email" 
                                aria-invalid="true" 
                                required >
                        </div>
                        <div>
                            <input 
                                v-model="userRegister.password"
                                type="password" 
                                aria-required="true" 
                                name="contact-form-email" 
                                class="form-control"
                                placeholder="Contraseña" 
                                aria-invalid="true" 
                                required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-1">
                                <button class="submit-btn btn-block" type="submit">
                                    <b v-if="!isLoadingRegister">REGISTRARSE</b>
                                    <b v-if="isLoadingRegister">CARGANDO...</b>
                                </button>
                            </div>
                            <div class="col-md-6 mt-1">
                                <button @click="register = false"
                                        class="submit-btn btn-block"
                                        type="button">
                                    <b>¿Ya tienes una cuenta? INICIAR SESIÓN</b>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </transition>
        </div>
            
    </div>

</template>
<script>

    export default {
        data(){
            return {
                register: false,
                isLoadingRegister: false,
                isLoadingLogin: false,
                userLogin: {
                    email: '',
                    password: ''
                },
                userRegister: {
                    name: '',
                    email: '',
                    password: '',
                    role: {
                        id: 3
                    }
                }
            }
        },
        methods: {
            async createUser(){

                this.isLoadingRegister = true;

                try {

                    const body = {};

                    body.name = this.userRegister.name;
                    body.email = this.userRegister.email;
                    body.role_id = this.userRegister.role.id;
                    body.password = this.userRegister.password;
                    
                    const response = await axios.post('/users', body);

                    this.isLoadingRegister = false;

                    if(response.status === 201){
                        this.register = false;
                    }

                } catch (e) {
                    console.log(e);
                    this.isLoadingRegister = false;
                }

            },
            clearRegisterForm(){
                this.userRegister.name = '';
                this.userRegister.email = '';
                this.userRegister.password = '';
            },
            async loginUser(){

                this.isLoadingLogin = true;

                try {

                    const body = {};

                    body.email = this.userLogin.email;
                    body.password = this.userLogin.password;

                    const response = await axios.post('/login-user', body);

                    console.log(response);
                    this.isLoadingLogin = false;

                    if(response.status === 200){
                        this.clearLoginForm();
                        this.$emit('on-login', 'susccess');
                        window.eventBus.$emit('on-login', 'success');
                        this.$router.push('/');
                    }


                } catch(e) {
                    console.log(e);
                }

            },
            clearLoginForm(){
                this.userLogin.email = '';
                this.userLogin.password = '';
            }
        },
        watch: {
            register(){
                this.clearRegisterForm();
                this.clearLoginForm();
            }
        }
    }

</script>

<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
