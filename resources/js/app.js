import VueRouter from 'vue-router'
import routes from './routers/index';

require('./bootstrap');
window.Vue = require('vue');

Vue.component(
    'app-home',
    require('./views/home/AppHome.vue').default
);

Vue.component(
    'nav-bar',
    require('./components/Navbar.vue').default
);

Vue.use(VueRouter);

const router = new VueRouter({
    routes
});

const app = new Vue({
    router
}).$mount('#app');
