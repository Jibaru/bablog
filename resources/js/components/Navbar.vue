<template>

    <div>
        <header>
            <div class="container-fluid position-relative no-side-padding">

                <a href="#" class="logo"><img src="images/logo.png" alt="Logo Image"></a>

                <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

                <ul class="main-menu visible-on-click" id="main-menu">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="#">Categorías</a>
                        <ul class="submenu">
                            <li><router-link to="/tecnologia">Tecnología</router-link></li>
                            <li><router-link to="/desarrollo">Desarrollo</router-link></li>
                            <li><router-link to="/aprendizaje">Aprendizaje</router-link></li>
                        </ul>
                    </li>
                    <!--<li><a href="#">Otros</a></li>-->
                </ul>

                <div class="src-area">
                    <form>
                        <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                        <input class="src-input" type="text" placeholder="Escribe para buscar">
                    </form>
                </div>
            </div>

        </header>
    </div>

</template>

<script>

    export default {


    }

</script>
