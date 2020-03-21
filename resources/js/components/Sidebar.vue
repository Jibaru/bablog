<template>

    <div>
        <div class="single-post info-area">

            <div class="about-area">
                <h4 class="title"><b>ACERCA DE BABLOG</b></h4>
                <p>
                    BaBlog es un blog creado como prueba de desarrollo en vue y laravel. Se pretende subir
                    contenido adicional más adelante y ver si se puede completar el sistema por ambos lados
                    (cliente y servidor). Por ahora está en pleno desarrollo.
                </p>
            </div>

            <div :class="{'sidebar-area': true ,'subscribe-area': true, 'pl-0 pr-0': from === 'POST'}">

                <h4 class="title"><b>SUSCRIBIRSE</b></h4>
                <div class="input-area">
                    <form>
                        <input class="email-input" type="text" placeholder="Ingresa tu email">
                        <button class="submit-btn" type="submit"><i class="ion-ios-email-outline"></i></button>
                    </form>
                </div>

            </div>

            <div :class="{'tag-area': true , 'pl-0 pr-0': from === 'POST'}">

                <h4 class="title"><b>TAGS</b></h4>
                <ul>
                    <li><a href="#">Informática</a></li>
                    <li><a href="#">Tecnología</a></li>
                    <li><a href="#">Programación</a></li>
                    <li><a href="#">Aprendizaje</a></li>
                    <li><a href="#">Siniestra</a></li>
                    <li><a href="#">Gaaa</a></li>
                </ul>

            </div><!-- subscribe-area -->

        </div><!-- info-area -->
    </div>

</template>

<script>

    export default {
        props: {
            from: {
                type: String,
                default: 'HOME'
            }
        }
    }

</script>
