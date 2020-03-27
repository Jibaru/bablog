<template>

    <div>
        <footer>
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-section">

                            <a class="logo" href="#"><img src="images/logo.png" alt="Logo Image"></a>
                            <p class="copyright">Ignacio Rueda Boada @ 2020.</p>
                            <p class="copyright">Diseñado por <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                            <ul class="icons">
                                <li><a href="https://www.facebook.com"><i class="ion-social-facebook-outline"></i></a></li>
                                <li><a href="https://www.twitter.com"><i class="ion-social-twitter-outline"></i></a></li>
                                <!--<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>-->
                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-section">
                            <h4 class="title"><b>TAGS</b></h4>
                            <ul>
                                <li v-for="(category, i) in categories" :key="i">
                                    <a :href="`/#/${category.name.toLowerCase()}`">{{category.name}}</a>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-section">

                            <h4 class="title"><b>ACERCA DE MI</b></h4>
                            <p class="copyright">
                                Desarrollador web, estudiante de Ingeniería
                                de Sistemas, freelance en tiempos de estudio.
                            </p>
                            <!--<div class="input-area">
                                <form>
                                    <input class="email-input" type="text" placeholder="Ingresa tu email">
                                    <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                                </form>
                            </div>-->

                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </div>

</template>
<script>

    export default {
        data(){
            return {
                categories: []
            }
        },
        methods: {
            async getCategories(){
                try {
                    const response = await axios.get('/categories');

                    if(response.status === 200){
                        this.categories = response.data;
                    }
                } catch (e) {
                    console.log(e);
                }
            }
        },
        mounted(){
            this.getCategories();
        }
    }

</script>
