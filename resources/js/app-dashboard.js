import VueRouter from 'vue-router'
import {TweenMax, Power2, TimelineLite} from "gsap";
import routes from "./routers/dashboard";

require('./bootstrap');
window.Vue = require('vue');

Vue.use(VueRouter);

Vue.component(
    'app-menu',
    require('./components/AppMenu.vue').default
);

const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
    router: router,
    el: '#app-dashboard'
});

