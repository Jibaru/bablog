<template>

    <div>
        <section class="hero is-success is-fullheight" style="background-image: url(&#39;https://www.animefenix.com/themes/animefenix-frans185/images/bg-login.jpg&#39;);">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">

                        <div class="card" style="border: 0px;">
                            <div class="card-image">
                                <figure class="image is-4by2">
                                    <div class="frans-no-click"></div>
                                    <img src="images/header-login.gif" alt="Login">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="content">

                                    <div class="field">
                                        <p class="control has-icons-left has-icons-right">
                                            <input class="input" type="text" placeholder="Usuario" id="username">
                                            <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
                                        </p>
                                    </div>
                                    <div class="field">
                                        <p class="control has-icons-left">
                                            <input class="input" type="password" placeholder="Contraseña" id="password">
                                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                                        </p>
                                    </div>

                                    <div class="notification is-danger is-paddingless" id="message">

                                    </div>
                                    <div class="field">
                                        <p class="control has-text-centered">
                                            <button class="button is-pink" id="send_button">Ingresar</button>
                                        </p>
                                    </div>

                                    <p class="has-text-grey has-text-weight-semibold">
                                        <a href="https://www.animefenix.com/user/signup">Registro</a> &nbsp;·&nbsp;
                                        <a href="https://www.animefenix.com/user/forgot-password" onclick="alert(&#39;En mantenimiento&#39;);return false;">Recuperar Contraseña</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

</template>
<script>

    export default {

    }

</script>
<style>

    .button.is-pink{
        background-color: #e53935;
        border-color: transparent;
        color: #fff;
    }
    .frans-no-click{
        position: absolute;
        height: 100%;
        width: 100%;
    }

    .hero {
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
    }
    .hero-body{
        background: rgba(0,0,0,0.6);
    }
    .card-content{
        background-color: #222;
    }
</style>
