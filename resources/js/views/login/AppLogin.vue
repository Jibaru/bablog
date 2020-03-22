<template>

    <div class="container pt-5">

        <div class="comment-form row">
            <div class="col-md-6">
                AQUÍ IRÁ EL LOGO
            </div>
            <div v-if="!register" class="col-md-6">
            <h4 class="pt-5">
                <b>INICIAR SESIÓN</b>
            </h4>
            <form method="post">
                <div>
                    <input type="email" aria-required="true" name="contact-form-name" class="form-control"
                           placeholder="Email" aria-invalid="true" required >
                </div>
                <div>
                    <input type="password" aria-required="true" name="contact-form-email" class="form-control"
                           placeholder="Contraseña" aria-invalid="true" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button class="submit-btn btn-block" type="submit">
                            <b>INGRESAR</b>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button @click="register = true"
                                class="submit-btn btn-block"
                                type="button">
                            <b>¿Eres nuevo? REGÍSTRATE</b>
                        </button>
                    </div>
                </div>
            </form>
        </div>
            <div v-if="register" class="col-md-6">
                <h4 class="pt-5">
                    <b>REGISTRARSE</b>
                </h4>
                <form method="post">
                    <div>
                        <input type="text" aria-required="true" name="contact-form-name" class="form-control"
                               placeholder="Nombre" aria-invalid="true" required >
                    </div>
                    <div>
                        <input type="email" aria-required="true" name="contact-form-name" class="form-control"
                               placeholder="Email" aria-invalid="true" required >
                    </div>
                    <div>
                        <input type="password" aria-required="true" name="contact-form-email" class="form-control"
                               placeholder="Contraseña" aria-invalid="true" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="submit-btn btn-block" type="submit">
                                <b>REGISTRARSE</b>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button @click="register = false"
                                    class="submit-btn btn-block"
                                    type="button">
                                <b>¿Ya tienes una cuenta? INICIAR SESIÓN</b>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>
<script>

    export default {
        data(){
            return {
                register: false,
                userLogin: {

                },
                userRegister: {

                }
            }
        }
    }

</script>

