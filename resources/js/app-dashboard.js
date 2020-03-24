import VueRouter from 'vue-router'
import {TweenMax, Power2, TimelineLite} from "gsap";
import routes from "./routers/dashboard";

require('./bootstrap');
window.Vue = require('vue');

Vue.use(VueRouter);

Vue.component(
    'app-administrator',
    require('./views/administrator/AppAdministrator').default
);

Vue.component(
    'navbar-administrator',
    require('./components/NavBarAdministator').default
);


const router = new VueRouter({

    routes
});

const app = new Vue({
    router: router,
}).$mount('#app-dashboard');;

